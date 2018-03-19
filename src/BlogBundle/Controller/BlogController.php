<?php

namespace BlogBundle\Controller;

use BlogBundle\Form\AjoutArticleForm;
use EntiteBundle\Entity\Article;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function ajouterArticleAction(Request $request) {

        $article = new Article();
        $article->setTexte($request->get('texte'));
        $article->setAuteur($this->getUser()->getId());
        $article->setTitre($request->get('titre'));
        var_dump($request->get('titre'));
        if ($article->getTexte() != null) {
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

    public function lireArticleAction($id) {

        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->findBy(['id'=> $id]);
        return $this->render('@Blog/Article/lireArticle.html.twig', array('article' => $article[0]));

    }
}
