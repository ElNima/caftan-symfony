<?php

namespace CAFTAN\AppBundle\Controller;

use CAFTAN\AppBundle\Entity\Annonce;
use CAFTAN\AppBundle\Entity\Image;
use CAFTAN\AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class PublierController extends Controller {

    public function indexAction(Request $req) {

    if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
        $annonceur = $this->getUser();
        $annonce = new Annonce();
        $em = $this->getDoctrine()->getManager();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $annonce);
        $formBuilder
                        ->add('title', TextType::class)
                        ->add('neuf', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class, array(
                            'label' => 'neuf',
                            'required' => false))
                        ->add('prix', TextType::class)
                        ->add('creation', TextType::class)
                        ->add('descr', TextareaType::class)
                        ->add('image', \CAFTAN\AppBundle\Form\ImageType::class)
                        ->add('annonceur', \CAFTAN\AppBundle\Form\UserType::class)
                        ->add('save', SubmitType::class);
                $form = $formBuilder->getForm();
                $form->get('annonceur')->setData($annonceur);
                if($annonceur->getAdress() !== null){
                    $form->get('annonceur')->get('adress')->setData($annonceur->getAdress());
                    $form->handleRequest($req);
                    if ($form->isSubmitted() && $form->isValid()) {
                      //  $annonce->getImage()->upload();
                        $em->persist($annonce);
                        //$em->persist($annonce->getImage());
                        $em->flush();
                         return $this->redirectToRoute('caftan_app_annoncepage', array('id' => $annonce->getId(), 'annonceur' => $annonceur));
                    }
                    return $this->render('CAFTANAppBundle:Home:publier.html.twig', array('form' => $form->createView(), 'annonceur' => $annonceur));
                }else{
                    $form->handleRequest($req);
                    if ($form->isSubmitted() && $form->isValid()) {
                        //$annonce->getImage()->upload();
                        $em->persist($annonce);
                        //$em->persist($annonce->getImage());
                        $em->persist($annonce->getAnnonceur()->getAdress());
                        $em->flush();
                         return $this->redirectToRoute('caftan_app_annoncepage', array('id' => $annonce->getId(), 'annonceur' => $annonceur));
                    }
                    return $this->render('CAFTANAppBundle:Home:publier.html.twig', array('form' => $form->createView(), 'annonceur' => $annonceur));
                }
                
                
        
    }else {
            return $this->redirectToRoute('fos_user_security_login');
        }
    }

}
