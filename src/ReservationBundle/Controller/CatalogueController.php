<?php

namespace ReservationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CatalogueController extends Controller
{
    public function ajouterAction()
    {
        return $this->render('ReservationBundle:Catalogue:ajouter.html.twig', array(
            // ...
        ));
    }

    public function supprimerAction()
    {
        return $this->render('ReservationBundle:Catalogue:supprimer.html.twig', array(
            // ...
        ));
    }

    public function modifierAction()
    {
        return $this->render('ReservationBundle:Catalogue:modifier.html.twig', array(
            // ...
        ));
    }

    public function listAction()
    {
        return $this->render('ReservationBundle:Catalogue:list.html.twig', array(
            // ...
        ));
    }

}
