<?php

namespace CAFTAN\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class ModifierannonceController extends Controller
{
    public function indexAction($id, Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository('CAFTANAppBundle:Annonce')->find($id);
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
                $form->handleRequest($req);
                if ($form->isSubmitted() && $form->isValid()) {
                        $em->flush();
                         return $this->redirectToRoute('caftan_app_annoncepage', array('id' => $annonce->getId()));
                    }
        return $this->render('CAFTANAppBundle:Home:modifierannonce.html.twig', array('form' => $form->createView()));
    }
    public function deleteAction($id, Request $req){
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('CAFTANAppBundle:Annonce');
        $annonce = $rep->find($id);
        $em->remove($annonce);
        $em->flush();
        return $this->redirectToRoute('caftan_app_annoncespage');
           
       }
}


