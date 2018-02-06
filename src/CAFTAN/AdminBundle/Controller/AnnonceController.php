<?php

namespace CAFTAN\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\Annonce;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnonceController extends Controller {

    public function showAction(Request $req) {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('CAFTANAppBundle:Annonce');
        $annonces = $rep->findAll();
//        $annonces=$rep->getAnnoncesWithImageWithAnnonceurWithAdress();
        return $this->render('CAFTANAdminBundle:Admin:show.html.twig', array('annonces' => $annonces));
    }

    public function createAction(Request $req) {
//        $annonce= new Annonce();
//        $form = $this->createForm('CAFTAN\AppBundle\Form\AnnonceType', $annonce);
//        $form->handleRequest($req);

        $annonce = new Annonce();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $annonce);
        if($this->getUser()->getAdress() != NULL){
            $formBuilder
                ->add('title', TextType::class)
                ->add('neuf', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class, array(
                    'label'    => 'neuf',
                    'required' => false))
                ->add('prix', TextType::class)
                ->add('creation', TextType::class)
                ->add('descr', TextareaType::class)
               ->add('published', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class, array(
                    'label'    => 'published',
                    'required' => false))
                ->add('image', \CAFTAN\AppBundle\Form\ImageType::class)
//      ->add('annonceur', \CAFTAN\AppBundle\Form\UserType::class)
                ->add('annonceur', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'CAFTANAppBundle:User',
                    'block_name' => 'username',
                    'multiple' => false
                ))
                ->add('save', SubmitType::class)

        ;
            $form = $formBuilder->getForm();
        $form->handleRequest($req);
     

        }else{
            $formBuilder
                ->add('title', TextType::class)
                ->add('neuf', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class, array(
                    'label'    => 'neuf',
                    'required' => false))
                ->add('prix', TextType::class)
                ->add('creation', TextType::class)
                ->add('descr', TextareaType::class)
               ->add('published', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class, array(
                    'label'    => 'published',
                    'required' => false))
                ->add('image', \CAFTAN\AppBundle\Form\ImageType::class)
                ->add('annonceur', \CAFTAN\AppBundle\Form\UserType::class)
                
                ->add('save', SubmitType::class)

        ;
            $form = $formBuilder->getForm();
            $form->get('annonceur')->setData($this->getUser());
            $form->handleRequest($req);
           
        }
        

        

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($annonce);
            $em->flush();

            return $this->redirectToRoute('caftan_admin_show_annonces', array('id' => $annonce->getId()));
        }
        return $this->render('CAFTANAdminBundle:Admin:update.html.twig', array(
                    'annonce' => $annonce,
                    'form' => $form->createView(),
        ));
    }

    public function updateAction(Request $req, $id) {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('CAFTANAppBundle:Annonce');
        $annonce = $rep->find($id);
        $img=$annonce->getImage();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $annonce);

        $formBuilder
                ->add('title', TextType::class)
                ->add('neuf', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class, array(
                    'label'    => 'neuf',
                    'required' => false))
                ->add('prix', TextType::class)
                ->add('creation', TextType::class)
                ->add('descr', TextareaType::class)
               // ->add('published', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class)
                ->add('image', \CAFTAN\AppBundle\Form\ImageType::class)
                ->add('annonceur', \CAFTAN\AppBundle\Form\UserType::class)
              /*  ->add('annonceur', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'CAFTANAppBundle:User',
                    'block_name' => 'username',
                    'multiple' => false
                ))*/
                ->add('save', SubmitType::class)

        ;

        $form = $formBuilder->getForm();
        
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $em->flush();
            return $this->redirectToRoute('caftan_admin_show_annonces');
        }
        return $this->render('CAFTANAdminBundle:Admin:update.html.twig', array(
                    'annonce' => $annonce,
                    'id' => $annonce->getId(),
                    'form' => $form->createView(),
        ));
    }

    public function deleteAction(Request $req, $id) {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('CAFTANAppBundle:Annonce');
        $annonce = $rep->find($id);
        $em->remove($annonce);
        $em->flush();
        return $this->redirectToRoute('caftan_admin_show_annonces');
    }

//    private function createDeleteForm(Annonce $annonce)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('caftan_admin_delete_annonces', array('id' => $annonce->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}
