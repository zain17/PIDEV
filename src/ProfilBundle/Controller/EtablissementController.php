<?php

namespace ProfilBundle\Controller;

use EntiteBundle\Entity\Etablissement;
use EntiteBundle\Entity\Photo;
use EntiteBundle\Form\EtablissementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EtablissementController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $etablissement=new Etablissement();
        $photo=new Photo();
        $form=$this->createForm(EtablissementType::class,$etablissement);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();
            foreach ($etablissement->getPhotos() as $value){
                $file=$value;
                $fileName = sha1(uniqid(mt_rand(), true)).'.'.$file->guessExtension();
                $file->move($this->getParameter('image_directory'),$fileName);
                $photo->setChemin($fileName);
                $photo->setEtablissement($etablissement);
                $em->persist($etablissement);
                $em->persist($photo);
                $em->flush();
            }

        }

        return $this->render('ProfilBundle:Etablissement:ajouter.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    public function listAction()
    {
        $em= $this->getDoctrine()->getManager();
        $etablissementsCafee=$em->getRepository("EntiteBundle:Etablissement")->findBy(['type'=> 'café'], ['note'=> 'DESC'], 4, 0);
        $etablissementsLoisirs=$em->getRepository("EntiteBundle:Etablissement")->findBy(['type'=> 'loisirs'], ['note'=> 'DESC'], 4, 0);
        $etablissementsShoppings=$em->getRepository("EntiteBundle:Etablissement")->findBy(['type'=> 'shopping'], ['note'=> 'DESC'], 4, 0);
        $etablissementsRestaurant=$em->getRepository("EntiteBundle:Etablissement")->findBy(['type'=> 'restaurant'], ['note'=> 'DESC'], 4, 0);
        return $this->render('@Profil/Etablissement/list.html.twig', array(
            "Cafees"=>$etablissementsCafee,
            "Loisirs"=>$etablissementsLoisirs,
            "Shoppings"=>$etablissementsShoppings,
            "Restaurants"=>$etablissementsRestaurant,
        ));
    }

    public function listAllAction()
    {
        $em= $this->getDoctrine()->getManager();
        $etablissements=$em->getRepository("EntiteBundle:Etablissement")->findAll(['note'=> 'DESC']);
        return $this->render('@Profil/Etablissement/all.html.twig', array(
            "etablissements"=>$etablissements
        ));
    }

    public function listBestAction()
    {
        $em= $this->getDoctrine()->getManager();
        $etablissements=$em->getRepository("EntiteBundle:Etablissement")->findAll(['note'=> 'DESC'], null, 10, 0);
        return $this->render('all.html.twig', array(
            "etablissements"=>$etablissements
        ));
    }

    public function supprimerAction($idDelete)
    {
        $em = $this->getDoctrine()->getManager();
        $etab= $em->getRepository(Etablissement::class)->find($idDelete);
        $em->remove($etab);
        $em->flush();
        return $this->redirectToRoute("list_etab");
    }
    public function modifierAction(Request $request,$idUpdate){
        $em= $this->getDoctrine()->getManager();
        $etabAModif=$em->getRepository("EntiteBundle:Etablissement")->find($idUpdate);
        $form=$this->createForm(EtablissementType::class,$etabAModif);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em->flush();
            return $this->redirectToRoute("list_etab");
        }
        return $this->render('@Profil/Etablissement/ajouter.html.twig', array(
            "form"=>$form->createView()
        ));
    }
    public function RechercheParGouvernoratAction(){

    }
    public  function RechercheParVilleAction(){

    }
    public function RechercheParTypeAction(){

    }
}
