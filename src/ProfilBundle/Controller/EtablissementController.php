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
            $em=$this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush();
        }
        return $this->render('ProfilBundle:Etablissement:ajouter.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    public function listAction()
    {
        $em= $this->getDoctrine()->getManager();
        $etablissements=$em->getRepository("EntiteBundle:Etablissement")->findAll();
        return $this->render('@Profil/Etablissement/list.html.twig', array(
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
}
