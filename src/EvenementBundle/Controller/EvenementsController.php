<?php

namespace EvenementBundle\Controller;

use EntiteBundle\Entity\Evenements;
use EntiteBundle\Form\EvenementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EvenementsController extends Controller
{
    public function ajoutAction(Request $request)
    {


        $ev=new Evenements();

        $Form=$this->createForm(EvenementsType::class,$ev);
        $Form->handleRequest($request);
        if($Form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em=persist($ev);
            $em->flush();

        }

        return $this->render('EvenementBundle:Evenements:ajout.html.twig', array(
            'form'=>$Form->createView()
        ));
    }

    public function modifierAction()
    {
        return $this->render('EvenementBundle:Evenements:modifier.html.twig', array(
            // ...
        ));
    }

    public function SupprimerAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $evenement=$em->getRepository('EntiteBundle:Evenements')->find($id);
        $em->remove($evenement);
        $em->flush();
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
