<?php

namespace EvenementBundle\Controller;

use EntiteBundle\EntiteBundle;
use EntiteBundle\Entity\Evenements;
use EntiteBundle\Form\EvenementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use EvenementBundle\Entity\CommentaireE ;


class EvenementsController extends Controller
{

    //ajout evenement
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


    //modifier un evenemts
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

    //supprimer evenemnt
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

    //affichage des évenements
    public function afficheAction()
    {
        $em=$this->getDoctrine()->getManager();
        $ev=$em->getRepository("EntiteBundle:Evenements")->findAll();
        return $this->render('EvenementBundle:Evenements:affiche.html.twig', array(
            'evenements'=>$ev
        ));
    }

    //calendrier des evenemnts

    public function calendarAction()
    {



        return $this->render('EvenementBundle:Evenements:calendar.html.twig', array(

        ));

    }


    //detail d'un événements n°
    public function detailAction($id,Request $request){

        $em=$this->getDoctrine()->getManager();
        $ev=$em->getRepository(Evenements::class)->find($id);


      //ajout commentaire
        $m=new CommentaireE();
        if($request->isMethod('POST')){
            $m->setContenu($request->get('contenu'));
            $m->setEve($ev);
            $em->persist($m);
            $em->flush();
        }

        //affiche commentaire
        $c=$em->getRepository("EvenementBundle:CommentaireE")->findByeve($id);

        //supprimer commentaire




        return $this->render('EvenementBundle:Evenements:detailEv.html.twig',array(
            'detail'=>$ev,
            'commentaire'=>$c
        ));
    }

}
