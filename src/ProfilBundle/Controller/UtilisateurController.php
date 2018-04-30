<?php

namespace ProfilBundle\Controller;

use EntiteBundle\Entity\Utilisateur;
use EntiteBundle\Form\UtilisateurType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class UtilisateurController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $utilisateur=new Utilisateur();
        $form=$this->createForm(UtilisateurType::class,$utilisateur);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $file=$utilisateur->getPhotoProfil();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('image_directory'),$fileName);
            $utilisateur->setPhotoProfil($fileName);
            $em=$this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();
            return $this->redirectToRoute("list_utilisateur");
        }
        return $this->render('ProfilBundle:Utilisateur:ajouter.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function supprimerAction($idDelete)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateur= $em->getRepository(Utilisateur::class)->find($idDelete);
        $em->remove($utilisateur);
        $em->flush();
        return $this->redirectToRoute("list_utilisateur");
    }

    public function modifierAction(Request $request,$idUpdate)
    {
        $em= $this->getDoctrine()->getManager();
        $utilisiateurAModif=$em->getRepository("EntiteBundle:Utilisateur")->find($idUpdate);
        $form=$this->createForm(UtilisateurType::class,$utilisiateurAModif);
        $form->handleRequest($request);
        if($form->isValid())
        {
            /**@var \Symfony\Component\HttpFoundation\File\UploadedFile $file */

            $file=$utilisiateurAModif->getPhotoProfil();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('image_directory'),$fileName);
            $utilisiateurAModif->setPhotoProfil($fileName);
            $em->flush();
            return $this->redirectToRoute("list_utilisateur");
        }
        return $this->render('ProfilBundle:Utilisateur:modifier.html.twig', array(
            "form"=>$form->createView()
        ));
    }

    public function listAction()
    {
        $em= $this->getDoctrine()->getManager();
        $utilisateurs=$em->getRepository("EntiteBundle:Utilisateur")->findAll();
        return $this->render('ProfilBundle:Utilisateur:list.html.twig', array(
            "utilisateurs"=>$utilisateurs
        ));
    }
    public function allAction()
    {
        $em= $this->getDoctrine()->getManager();
        $utilisateurs=$em->getRepository("EntiteBundle:Utilisateur")
            ->findAll();
        $serializer=new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($utilisateurs);
        return new JsonResponse($formatted);
    }



}
