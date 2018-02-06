<?php

namespace CAFTAN\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class CompteprofilController extends Controller
{
    public function indexAction($id, Request $req)
    {
         $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository('CAFTANAppBundle:User')->find($this->getUser()->getId());
         $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $user);
        $formBuilder
                        ->add('email', EmailType::class)
                        ->add('username', TextType::class)
                        //->add('password', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class)
                        ->add('save', SubmitType::class);
    $form = $formBuilder->getForm();
                $form->handleRequest($req);
                if ($form->isSubmitted() && $form->isValid()) {
                        $em->flush();
                        return $this->redirectToRoute('caftan_app_profilpage', array('id' => $this->getUser()->getId()));
                    }
        return $this->render('CAFTANAppBundle:Home:compteprofil.html.twig', array('form' => $form->createView()));
    }
    
}


