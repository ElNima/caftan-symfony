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
            //$authenticationUtils = $this->get('security.authentication_utils');
            $annonce = new Annonce();
            // $annonceur=$this->getDoctrine()->getManager()->getRepository('CAFTANAppBundle:User')->findOneBy(array('username'=>$authenticationUtils->getLastUserName()));
            $annonceur = $this->getUser();
            $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $annonce);

            if ($annonceur->getAdress() !== NULL) {
                $formBuilder
                        ->add('title', TextType::class)
                        ->add('neuf', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class, array(
                            'label' => 'neuf',
                            'required' => false))
                        ->add('prix', TextType::class)
                        ->add('creation', TextType::class)
                        ->add('descr', TextareaType::class)
                        ->add('image', \CAFTAN\AppBundle\Form\ImageType::class)
                        ->add('annonceur', \CAFTAN\AppBundle\Form\AnnonceurType::class)
                        ->add('save', SubmitType::class);
                $form = $formBuilder->getForm();
                $form->get('annonceur')->setData($annonceur);
                $form->handleRequest($req);

                if ($form->isSubmitted() && $form->isValid()) {
                    $em = $this->getDoctrine()->getManager();

                    $em->persist($annonce);
                    $em->persist($annonce->getImage());
                    $em->flush();
                    return $this->redirectToRoute('caftan_app_annoncepage', array('id' => $annonce->getId(), 'annonceur' => $annonceur));
                }
                return $this->render('CAFTANAppBundle:Home:publier.html.twig', array('form' => $form->createView(), 'annonceur' => $annonceur));
            } else {
                $formBuilder
                        ->add('title', TextType::class)
                        ->add('neuf', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class, array(
                            'label' => 'neuf',
                            'required' => false))
                        ->add('prix', TextType::class)
                        ->add('creation', TextType::class)
                        ->add('descr', TextareaType::class)
                        ->add('image', \CAFTAN\AppBundle\Form\ImageType::class)
                        ->add('annonceur', \CAFTAN\AppBundle\Form\UserpType::class)
                        ->add('save', SubmitType::class);
                $form = $formBuilder->getForm();
                $form->get('annonceur')->get('email')->setData($annonceur->getEmail());
                $form->get('annonceur')->get('password')->setData($annonceur->getPassword());
                $form->get('annonceur')->get('username')->setData($annonceur->getUsername());
                $form->handleRequest($req);

                if ($form->isSubmitted() && $form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    // $user=$form->getAnnonceur()->getData();
                     
                    $em->persist($annonce);
                   $em->persist($annonce->getImage());
 //                  $em->persist($annonce->getAnnonceur());
                $em->persist($annonce->getAnnonceur()->getNom());
                $em->persist($annonce->getAnnonceur()->getPrenom());
                $em->persist($annonce->getAnnonceur()->getCreateur());
////                $em->persist($annonce->getAnnonceur()->getUsername());
                    $em->persist($annonce->getAnnonceur()->getAdress());
                    $em->flush();

                    return $this->redirectToRoute('caftan_app_annoncepage', array('id' => $annonce->getId(), 'annonceur' => $annonceur));
                }
                return $this->render('CAFTANAppBundle:Home:publier.html.twig', array('form' => $form->createView(), 'annonceur' => $annonceur));
            }





            
        } else {
            return $this->redirectToRoute('fos_user_security_login');
        }
    }

}
