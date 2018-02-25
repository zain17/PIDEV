<?php

namespace EntiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{
    public function ajouterAction()
    {
        return $this->render('EntiteBundle:Produit:ajouter.html.twig', array(
            // ...
        ));
    }

    public function supprimerAction()
    {
        return $this->render('EntiteBundle:Produit:supprimer.html.twig', array(
            // ...
        ));
    }

    public function modifierAction()
    {
        return $this->render('EntiteBundle:Produit:modifier.html.twig', array(
            // ...
        ));
    }

    public function listAction()
    {
        return $this->render('EntiteBundle:Produit:list.html.twig', array(
            // ...
        ));
    }

}
