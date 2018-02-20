<?php

namespace EvenementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EvenementsController extends Controller
{
    public function ajoutAction()
    {
        return $this->render('EvenementBundle:Evenements:ajout.html.twig', array(
            // ...
        ));
    }

    public function modifierAction()
    {
        return $this->render('EvenementBundle:Evenements:modifier.html.twig', array(
            // ...
        ));
    }

    public function SupprimerAction()
    {
        return $this->render('EvenementBundle:Evenements:supprimer.html.twig', array(
            // ...
        ));
    }

    public function afficheAction()
    {
        return $this->render('EvenementBundle:Evenements:affiche.html.twig', array(
            // ...
        ));
    }

}
