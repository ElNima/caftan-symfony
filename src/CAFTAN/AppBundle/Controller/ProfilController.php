<?php

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class ProfilController extends Controller
{
    public function indexAction($id)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
        $em = $this->getDoctrine()->getManager();
        
        $user = $em->getRepository('CAFTANAppBundle:User')->find($id);
       
        return $this->render('CAFTANAppBundle:Home:profil.html.twig', array(
            'user' => $user,'id'=>$id
        ));
        }else {
            return $this->redirectToRoute('fos_user_security_login');
        }
    }   
        
}


