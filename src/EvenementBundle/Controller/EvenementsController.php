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
            /**@var \Symfony\Component\HttpFoundation\File\UploadedFile $file */

            $file=$ev->getBrochure();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('image_directory'),$fileName);
            $ev->setBrochure($fileName);
            $em=$this->getDoctrine()->getManager();
            $em->persist($ev);
            $em->flush();
            $this->redirectToRoute('affiche');

        }

        return $this->render('EvenementBundle:Evenements:ajout.html.twig', array(
            'form'=>$Form->createView()
        ));
    }

    public function modifierAction(Request $request , $id)
    {
        $em=$this->getDoctrine()->getManager();
        $evenement=$em->getRepository('EntiteBundle:Evenements')->find($id);
        $Form=$this->createForm(EvenementsType::class,$evenement);

        $Form->handleRequest($request);
        if($Form->isValid()){
            /**@var \Symfony\Component\HttpFoundation\File\UploadedFile $file */

            $file=$evenement->getBrochure();
            $fileName= md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('image_directory'),$fileName);
            $evenement->setBrochure($fileName);
            $em=$this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute('affiche');
        }

        return $this->render('EvenementBundle:Evenements:modifier.html.twig', array(
            'form'=>$Form->createView()
        ));
    }

    public function SupprimerAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $evenement=$em->getRepository('EntiteBundle:Evenements')->find($id);
        $em->remove($evenement);
        $em->flush();
        $this->redirectToRoute('affiche');
        return $this->render('EvenementBundle:Evenements:supprimer.html.twig', array(
            // ...
        ));
    }

    public function afficheAction()
    {
        $em=$this->getDoctrine()->getManager();
        $ev=$em->getRepository("EntiteBundle:Evenements")->findAll();
        return $this->render('EvenementBundle:Evenements:affiche.html.twig', array(
            'evenements'=>$ev
        ));
    }

}
