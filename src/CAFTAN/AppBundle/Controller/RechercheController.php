<?php

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RechercheController extends Controller
{
    public function indexAction()
    {
        
        return $this->render('CAFTANAppBundle:Home:recherche.html.twig');
    }
}


