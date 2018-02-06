<?php

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Form\ImageType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class ImgprofilController extends Controller
{
    public function indexAction($id, Request $req)
    {
         if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
             
             $em = $this->getDoctrine()->getManager();
             $user=$em->getRepository('CAFTANAppBundle:User')->find($this->getUser()->getId());
             $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $user);
             $formBuilder
                        ->add('image', ImageType::class);
             $form = $formBuilder->getForm();
             $form->handleRequest($req);
                    if ($form->isSubmitted() && $form->isValid()) {
                      
                        $em->persist($user->getImage());
                        $em->flush();
                         return $this->redirectToRoute('caftan_app_profilpage', array('id' => $this->getUser()->getId()));
                    }
             return $this->render('CAFTANAppBundle:Home:imgprofil.html.twig', array('form' => $form->createView()));
         }
        
    
    }
    
}


