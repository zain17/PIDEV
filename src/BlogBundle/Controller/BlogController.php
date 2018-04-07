<?php

namespace BlogBundle\Controller;

use BlogBundle\Commentaires\CommentairesContainer;
use BlogBundle\Form\AjoutArticleForm;
use Doctrine\Common\Persistence\ObjectRepository;
use EntiteBundle\Entity\Article;
use EntiteBundle\Entity\CommentaireB;
use EntiteBundle\Entity\Tag;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function ajouterArticleAction(Request $request) {

        $article = new Article();
        $article->setTexte($request->get('texte'));
        if ($article->getTexte() != null) {
            $article->setAuteur($this->getUser()->getId());
            $article->setAuteurN($this->getUser()->getUsername());
            $article->setTitre($request->get('titre'));
            $tagstr = $request->get('tagsTxt');
            if ($tagstr != null) {

                $arrs = explode(',', $tagstr);
                for ($i = 0; $i < sizeof($arrs); $i++) {
                    $tt = new Tag();
                    $tt->setName($arrs[$i]);
                    $temp = $this->getDoctrine()->getRepository(Tag::class)->findBy(["name"=>$tt->getName()]);
                    if ($temp)
                        $tt = $temp[0];
                    else
                    $this->getDoctrine()->getManager()->persist($tt);
                    $article->addTag($tt);
                }
            }
            $article->setTagsText($request->get('tagsTxt'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('blog_lireArticle', ['id' => $article->getId()]);
        }
        return $this->render('@Blog/Article/ajouterArticle.html.twig', array(
            'value' => null
            )

            );

    }



    public function lireArticleAction(Request $request, $id) {

        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->find($id);
        if ($request->get('ctext') != null) {
            $commentaire = new CommentaireB();
            $commentaire->setText($request->get('ctext'));
            $commentaire->setAuteur($this->getUser()->getId());
            $commentaire->setAuteurN($this->getUser()->getUsername());
            $commentaire->setArticle($article);
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush();
        }


        return $this->render('@Blog/Article/lireArticle.html.twig', array('article' => $article, 'commentaires'=>$article->getCommentaires()));

    }

    public function supprimerArticleAction($id) {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->find($id);
        $em = $this->getDoctrine()->getManager();
        $tags = $article->getTags();
        $em->remove($article);
        foreach ($tags as $tag) {
            $em->remove($tag);
        }
        $em->flush();
        return $this->redirectToRoute('blog_listeArticles');
    }

    public function modifierCAction(Request $request, $id) {

        $repo = $this->getDoctrine()->getRepository(CommentaireB::class);
        $commentaire = $repo->find($id);
        $aId = $commentaire->getArticle();
        if($request->get('ctext')!=null) {
            $em = $this->getDoctrine()->getManager();
            $commentaire->setText($request->get('ctext'));
            $em->persist($commentaire);
            $em->flush();
            return $this->redirectToRoute('blog_lireArticle', ["id"=>$request->get('articleid')]);

        }
        /*
        */
        return $this->render('@Blog/Commentaire/modifierCommentaire.html.twig', ["commentaire"=> $commentaire]);
    }
    public function modifierArticleAction(Request $request,$id=null) {

        $repo = $this->getDoctrine()->getRepository('EntiteBundle:Article');
        $article = $repo->find($id);
        if ($request->get('texte') != null) {
            $article->setTexte($request->get('texte'));
            $article->setAuteur($this->getUser()->getId());
            $article->setAuteurN($this->getUser()->getUsername());
            $article->setTitre($request->get('titre'));
            $em = $this->getDoctrine()->getManager();
            $article->id =  $request->get('id');
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('blog_lireArticle', ['id' => $article->getId()]);
        }
        return $this->render('@Blog/Article/modifierArticle.html.twig', array(
                'article' => $article
            )

        );
    }


/*
    public function findComments($id) {
        $repo = $this->getDoctrine()->getRepository(CommentaireB::class);

        $rootComments = $repo->findBy(['article' => $id, 'parent'=> null]);

        $container = new CommentairesContainer();
        $container->commentaire = null;

        $this->retrieveCommentTree($container, $rootComments, $repo);
        return $container;
    }


    public function retrieveCommentTree(CommentairesContainer $parentContainer, $childrenComents, ObjectRepository $repo) {
        foreach ($childrenComents as $commentaire) {
            $childContainer = new CommentairesContainer();
            $childContainer->commentaire = $commentaire;

            $nextChildren = $repo->findBy(['parent'=>$commentaire->getId()]);
            echo("Comment id: " . $childContainer->commentaire->getId()." ".$childContainer->commentaire->getText(). " , have : " . sizeof($nextChildren). " children" ."\n");
            if ($nextChildren == null) {
                echo("No children for id: " .$childContainer->commentaire->getId() . " ". $childContainer->commentaire->getText(). "\n");
                echo("End looking for children of " . $childContainer->commentaire->getId() . " " . $childContainer->commentaire->getText(). "\n");
                return null;
                //$childContainer->childrenContainers = null;
                //array_push($parentContainer->childrenContainers, $childContainer);
            }
            else {
                array_push($parentContainer->childrenContainers, $this->retrieveCommentTree($childContainer, $nextChildren, $repo));
                echo("ParentContainer size: ".sizeof($parentContainer->childrenContainers));
                return $parentContainer;
            }
        }
        }
*/

    public function supprimerCommentaireAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()->getRepository(CommentaireB::class);
        $articleid = $repo->find($id)->getArticle()->getId();
        $em->remove($repo->find($id));
        $em->flush();
        return $this->redirectToRoute("blog_lireArticle", ["id"=>$articleid]);


    }

    public function listeArticleAction(Request $request) {


        if (!$request->isXmlHttpRequest()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $dql = "SELECT a FROM EntiteBundle:Article a";
            $query = $em->createQuery($dql);

            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $query,
                $request->query->getInt('page', 1),
                3
            );
            if ($this->getUser())
                echo($this->getUser()->getUsername());

            return $this->render('@Blog/Article/listeArticles.html.twig', array(
                'pagination' => $pagination
            ));
        }
        else {
            $em = $this->get('doctrine.orm.entity_manager');
            $query = null;

            if ($request->get('text') != null) {
                $dql = "SELECT a FROM EntiteBundle:Article a WHERE a.texte LIKE :texte OR a.titre LIKE :texte";

                $query = $em->createQuery($dql);
                $query->setParameter('texte', '%' . $request->get('text') . '%');
            }
            else if ($request->get('tag') != null) {
                //$dql = "SELECT a FROM EntiteBundle:Article a WHERE 1 = 1";
                //$em->createQuery($dql);
                //$query = $em->createQuery($dql);
               // $query->setParameter('tagid', $request->get('tag'));
                // $query = $em->createNativeQuery("SELECT * from article a, article_tag t
                                           //               where a.id = t.article_id and t.tag_id = ?", $request->get('tag'));
                $query = $em->createQueryBuilder()
                    ->select('a')
                    ->from('EntiteBundle:Article', 'a')
                    ->join('a.tags', 't')
                    ->where('t.name = :name')
                    ->setParameter('name', $request->get('tag'))
                    ->getQuery();

              //  $repo = $em->getRepository('EntiteBundle:Article');
               // $query = $repo->findByTag($request->get('tag'));
            }

            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $query,
                $request->query->getInt('page', 1),
                3
            );
            if ($this->getUser())
                echo($this->getUser()->getUsername());

             $template = $this->render('@Blog/Article/paginationTemplate.html.twig', array(
                'pagination' => $pagination
            ))->getContent();

             return new Response($template);

        }
    }


}
