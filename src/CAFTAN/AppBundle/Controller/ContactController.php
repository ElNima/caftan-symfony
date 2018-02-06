<?php

namespace CAFTAN\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\Message;

class ContactController extends Controller
{
    public function indexAction(Request $req)
    {
        $message= new Message();
        $em = $this->getDoctrine()->getManager();
       // $messager=$this->getUser();
        $user = $em->getRepository('CAFTANAppBundle:User')-> findOneBy(array( 'username'=>'naima'));
       // $admin=$user->getname();
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $message);
        $formBuilder
                ->add('email', \Symfony\Component\Form\Extension\Core\Type\EmailType::class)
                ->add('subject', \Symfony\Component\Form\Extension\Core\Type\TextType::class)
                ->add('Content', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
               // ->add('receiver', \CAFTAN\AppBundle\Form\AnnonceurType::class)
                ->add('send', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)

        ;
        $form = $formBuilder->getForm();
        //$form ->get('receiver')->setData($user);
        
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $message->setReceiver($user);
            $em->persist($message);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'message envoyé!!!');
            return $this->redirectToRoute('caftan_app_contactpage');
        }
        return $this->render('CAFTANAppBundle:Home:contact.html.twig', array(
            
            'form' => $form->createView(),
            'receiver'=>$user
        ));
       
    }
}


