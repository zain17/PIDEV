<?php

namespace ProfilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhotoController extends Controller
{
    public function ajouterAction()
    {
        return $this->render('ProfilBundle:Photo:ajouter.html.twig', array(
            // ...
        ));
    }

    public function supprimerAction()
    {
        return $this->render('ProfilBundle:Photo:supprimer.html.twig', array(
            // ...
        ));
    }

    public function listAction()
    {
        return $this->render('ProfilBundle:Photo:list.html.twig', array(
            // ...
        ));
    }

    public function modifierAction()
    {
        return $this->render('modifier.html.twig', array(
            // ...
        ));
    }

}
