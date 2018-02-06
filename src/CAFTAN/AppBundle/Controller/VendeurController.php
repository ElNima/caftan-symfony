<?php

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\Message;
class VendeurController extends Controller
{
    public function indexAction($id, Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('CAFTANAppBundle:User')->findOneBy(array('id' => $id)); 
      //  $sender=$this->getUser();
        $annonces=$em->getRepository('CAFTANAppBundle:Annonce')-> findBy(array('annonceur'=>$user->getId()));  
        $message= new Message();
        
        $formB = $this->get('form.factory')->createBuilder(FormType::class, $message);

        $formB
                ->add('email', \Symfony\Component\Form\Extension\Core\Type\EmailType::class)
                ->add('subject', \Symfony\Component\Form\Extension\Core\Type\TextType::class)
                ->add('content', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
              
              
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)

        ;

       
        $formm = $formB->getForm();
        $formm->handleRequest($req);
        if($formm->isSubmitted() && $formm->isValid()){
//            $message->setSender($sender);
            $message->setReceiver($user);
            $em->persist($message);
            $em->flush();
        }
       

        return $this->render('CAFTANAppBundle:Home:vendeur.html.twig', array(
            'user'=>$user,
            'annonces'=>$annonces,
            'id'=>$id,
            'formm' => $formm->createView()
                ));
    }
}


