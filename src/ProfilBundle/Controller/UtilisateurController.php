<?php

namespace ProfilBundle\Controller;

use EntiteBundle\Entity\Utilisateur;
use EntiteBundle\Form\UtilisateurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UtilisateurController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $utilisateur=new Utilisateur();
        $form=$this->createForm(UtilisateurType::class,$utilisateur);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($utilisateur);
            $em->flush();
        }
        return $this->render('ProfilBundle:Utilisateur:ajouter.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function supprimerAction()
    {
        return $this->render('ProfilBundle:Utilisateur:supprimer.html.twig', array(
            // ...
        ));
    }

    public function modifierAction()
    {
        return $this->render('ProfilBundle:Utilisateur:modifier.html.twig', array(
            // ...
        ));
    }

    public function listAction()
    {
        return $this->render('ProfilBundle:Utilisateur:list.html.twig', array(
            // ...
        ));
    }

}
