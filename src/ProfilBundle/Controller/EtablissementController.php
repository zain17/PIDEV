<?php

namespace ProfilBundle\Controller;

use EntiteBundle\Entity\Etablissement;
use EntiteBundle\Form\EtablissementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class EtablissementController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $etablissement=new Etablissement();
        $form=$this->createForm(EtablissementType::class,$etablissement);
        $form->handleRequest($request);
        if($form->isSubmitted() && !$this->getUser()->getEtablissement()&& $this->getUser()->getRoles()[0]=="ROLE_ETABLISSEMENT") {
            $file=$etablissement->getPhoto();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('image_directory'),$fileName);
            $etablissement->setPhoto($fileName);
            $em=$this->getDoctrine()->getManager();
            $this->getUser()->setEtablissement($etablissement);
            $em->persist($etablissement);
            $em->flush();
            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('ProfilBundle:Etablissement:ajouter.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    public function listAction()
    {
        $em= $this->getDoctrine()->getManager();
        $etablissementsCafee=$em->getRepository("EntiteBundle:Etablissement")->findBy(['type'=> 'cafe'], ['note'=> 'DESC'], 4, 0);
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
    //fonction recherche avc ajax
    public function rechercheAjaxAction(Request $request)
    {
        if($request->isXmlHttpRequest())
        {
            $marque=$request->get('q');
            $em= $this->getDoctrine()->getManager();
            $etablissements=$em->getRepository("EntiteBundle:Etablissement")->searchByName($marque);
            //etape 1: initialiser le serializer
            $serializer=new Serializer(array(new ObjectNormalizer()));
            //etape 2 : transformation liste des objets
            $data=$serializer->normalize($etablissements);
            //etape 3 : encodage format JSON
            return new JsonResponse($data);
        }
        return $this->render('ProfilBundle:Etablissement:all.html.twig', array(

        ));
    }
    public function listBestAction()
    {
        $em= $this->getDoctrine()->getManager();
        $etablissements=$em->getRepository("EntiteBundle:Etablissement")->findAll(['note'=> 'DESC'], null, 10, 0);
        return $this->render('@Profil/Etablissement/all.html.twig', array(
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

    public function getDetailAction($idDetail){
        $em= $this->getDoctrine()->getManager();
        $etablissement=$em->getRepository("EntiteBundle:Etablissement")->find($idDetail);
        return $this->render('@Profil/Etablissement/details.html.twig', array(
            "etablissement"=>$etablissement
        ));
    }
    public function RechercheParGouvernoratAction(){

    }
    public  function RechercheParVilleAction(){

    }
    public function RechercheParTypeAction(){

    }
}
