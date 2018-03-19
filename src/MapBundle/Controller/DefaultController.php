<?php

namespace MapBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function coordonnesMapAction($idDetail){
        $em= $this->getDoctrine()->getManager();
        $etablissement=$em->getRepository("EntiteBundle:Etablissement")->find($idDetail);
        $coordonnes = ['longitudes'=>$etablissement->getLongitude(),'latitudes'=>$etablissement->getLatitude()];
        return $this->render('@Map/Default/index.html.twig', array(
            "coordonnes"=> $coordonnes
        ));
    }
}
