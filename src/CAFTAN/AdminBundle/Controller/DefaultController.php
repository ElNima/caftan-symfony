<?php

namespace CAFTAN\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CAFTANAdminBundle:Default:index.html.twig');
    }
}
