<?php

namespace EvenementBundle\Controller;

use EvenementBundle\Entity\CommentaireE;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EntiteBundle\Entity\Evenements;


class CommentaireEController extends Controller
{


    public function SupprimerAction($id,$ide)
    {
        $em=$this->getDoctrine()->getManager();
        $ev=$em->getRepository(Evenements::class)->findOneBy(['id'=>$ide]);


        $evenement=$em->getRepository(CommentaireE::class)->find($id);
        $em->remove($evenement);
        $em->flush();
        return $this->redirect($this->generateUrl('detail', array(
            'id' =>$ide )));
        return $this->render('EvenementBundle:Evenements:detailEv.html.twig', array(

        ));
    }

    public function ModifierAction($id,$ide,Request $request)
    {
            $em = $this->getDoctrine()->getManager();
            $m = $em->getRepository(CommentaireE::class)->find($id);
            $ev=$em->getRepository(Evenements::class)->find($ide);



        if ($request->isMethod('POST')) {
            $m->setContenu($request->get('contenu'));
            $em->persist($m);
            $em->flush();

            return $this->redirect($this->generateUrl('detail', array(
                'id' =>$ide )));
        }

        return $this->render('EvenementBundle:Evenements:detailEv_modifier_commentaire.html.twig', array(
            'detail'=>$ev,
            'commentaire'=>$m


    ));
    }



}
