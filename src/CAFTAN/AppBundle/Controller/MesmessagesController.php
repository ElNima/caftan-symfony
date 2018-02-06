<?php

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MesmessagesController extends Controller
{
    public function indexAction($id, Request $req)
    {
//        $user=$this->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $messages= $em->getRepository('CAFTANAppBundle:Message')->findBy(
                array('receiver'=>$id),
                array('date'=> 'desc')
                );
       
        
        return $this->render('CAFTANAppBundle:Home:mesmessages.html.twig', array(
            'messages'=>$messages,
            'id'=>$id
        ));
       
    }
     public function deleteAction($id)
    {
         $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Message');
        $message=$rep->find($id);
       
        $em->remove($message);
        $em->flush();
        
        return $this->redirectToRoute('caftan_app_mesmessagespage', array(
         
            'id'=>$id
        ));
       
    }
}


