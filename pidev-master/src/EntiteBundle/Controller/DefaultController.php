<?php

namespace EntiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EntiteBundle:Default:index.html.twig');
    }
}
