<?php

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MesAnnoncesController extends Controller
{

    
     public function indexAction($id)
    {
         $em = $this->getDoctrine()->getManager();
         $adverts=$em->getRepository('CAFTANAppBundle:Annonce')->findBy(array('annonceur'=>$id));
    return $this->render('CAFTANAppBundle:Home:mesannonces.html.twig', array(
        'adverts' => $adverts,
       'id'        => $id,
    ));
  
    }
    
}


