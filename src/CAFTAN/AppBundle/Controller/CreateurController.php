<?php

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\Comment;
use CAFTAN\AppBundle\Entity\Message;
class CreateurController extends Controller
{
    public function indexAction($id, Request $req)
    {
        
        $em = $this->getDoctrine()->getManager();
       // $sender=$this->getUser();
        $createur = $em->getRepository('CAFTANAppBundle:User')-> findOneBy(array('id' => $id, 'createur'=>true));
       // $comments = $em->getRepository('CAFTANAppBundle:Comment')-> findBy(array('createur'=>$id));
        $comments = $em->getRepository('CAFTANAppBundle:Comment')->findBy(array('createur'=>$createur->getId()));
        $comment= new Comment();
        $message= new Message();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $comment);

        $formBuilder
                ->add('comment', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
              
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)

        ;
        $formB = $this->get('form.factory')->createBuilder(FormType::class, $message);

        $formB
                ->add('email', \Symfony\Component\Form\Extension\Core\Type\EmailType::class)
                ->add('subject', \Symfony\Component\Form\Extension\Core\Type\TextType::class)
                ->add('content', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
              
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)

        ;

        $form = $formBuilder->getForm();
        $form->handleRequest($req);
        $formm = $formB->getForm();
        $formm->handleRequest($req);
        if($formm->isSubmitted() && $formm->isValid()){
//            $message->setSender($sender);
            $message->setReceiver($createur);
            $em->persist($message);
            
            $em->flush();
        }
//        }else{
//            return $this->render('CAFTANAppBundle:Home:createur.html.twig', array(
//            'createur' => $createur,
//            'id'=>$id,
//            'comments'=>$comments,
//            'formm' => $formm->createView()
//            
//        ));
//        }
        if($form->isSubmitted() && $form->isValid()){
            $comment->setCommenter($this->getUser());
            $comment->setCreateur($createur);
            $em->persist($comment);
            
            $em->flush();
            return $this->render('CAFTANAppBundle:Home:createur.html.twig', array(
            'createur' => $createur, 
            'comments'=>$comments,
            'formm'=>$formm->createView(),
            'form'=>$form->createView(),
            'id'=>$id
        ));
       return $this->redirectToRoute('caftan_app_createurpage', array('id' => $createur->getId()));
        }
        return $this->render('CAFTANAppBundle:Home:createur.html.twig', array(
            'createur' => $createur,
            'id'=>$id,
            'comments'=>$comments,
            'form' => $form->createView(),
            'formm' => $formm->createView()
            
        ));
     
      
       

    }
}


