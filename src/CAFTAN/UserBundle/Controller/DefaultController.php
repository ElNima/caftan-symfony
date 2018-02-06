<?php

namespace CAFTAN\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CAFTANUserBundle:Default:index.html.twig');
    }
}
