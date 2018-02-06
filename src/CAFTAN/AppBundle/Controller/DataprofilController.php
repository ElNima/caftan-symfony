<?php

namespace CAFTAN\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class DataprofilController extends Controller
{
    public function indexAction($id, Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        $user=$em->getRepository('CAFTANAppBundle:User')->find($this->getUser()->getId());
         $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $user);
        $formBuilder
                        ->add('nom', TextType::class)
                        ->add('prenom', TextType::class)
                        ->add('tel', TextType::class)
                        ->add('adress', \CAFTAN\AppBundle\Form\AdressType::class)
                        ->add('save', SubmitType::class);
                $form = $formBuilder->getForm();
                $form->handleRequest($req);
                if ($form->isSubmitted() && $form->isValid()) {
                        $em->flush();
                        return $this->redirectToRoute('caftan_app_profilpage', array('id' => $this->getUser()->getId()));
                    }
        return $this->render('CAFTANAppBundle:Home:modifierannonce.html.twig', array('form' => $form->createView()));
    }
    
}


