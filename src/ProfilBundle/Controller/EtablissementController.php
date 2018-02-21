<?php

namespace ProfilBundle\Controller;

use EntiteBundle\Entity\Etablissement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EtablissementController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $etablissement=new Etablissement();
        $form=$this->createForm(Etablissement::class,$etablissement);
        $form->handleRequest($request);
        return $this->render('ProfilBundle:Etablissement:ajouter.html.twig', array(
            'form'=>$form->createView()
        ));
    }

}
