<?php

//

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SignaledController extends Controller {

    public function indexAction($id, Request $req) {
        $em = $this->getDoctrine()->getManager();

        $annonce = $em->getRepository('CAFTANAppBundle:Annonce')->find($id);

        $formBuilder = $this->get('form.factory')->createBuilder(\Symfony\Component\Form\Extension\Core\Type\FormType::class, $annonce);

        $formBuilder
                ->add('signaled', SubmitType::class);
        $form = $formBuilder->getForm();
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($annonce->getPublished());
            $em->flush();
            return $this->redirectToRoute('caftan_app_annoncepage');
        }
        return $this->render('CAFTANAppBundle:Home:annonce.html.twig', array(
                    'annonce' => $annonce,
                    'id' => $annonce->getId(),
                    'form' => $form->createView(),
        ));
    }
}