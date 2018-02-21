<?php

namespace ProfilBundle\Controller;

use EntiteBundle\Entity\Etablissement;
use EntiteBundle\Form\EtablissementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EtablissementController extends Controller
{
    public function ajouterAction(Request $request)
    {
        $etablissement=new Etablissement();
        $form=$this->createForm(EtablissementType::class,$etablissement);
        $form->handleRequest($request);
        if($form->isSubmitted()) {

        }
        return $this->render('ProfilBundle:Etablissement:ajouter.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    public function deleteAction($id){

    }
    public function listAction()
    {
        $em= $this->getDoctrine()->getManager();
        $etablissements=$em->getRepository("EntiteBundle:Etablissement")->findAll();
        return $this->render('@Profil/Etablissement/list.html.twig', array(
            "etablissements"=>$etablissements
        ));
    }
}
