<?php //

namespace CAFTAN\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\Comment;
use CAFTAN\AppBundle\Entity\Message;

class AnnonceController extends Controller
{
    public function indexAction($id, Request $req)
    {
        $utilisateurEncour=$this->getUser();
        $em = $this->getDoctrine()->getManager();
        $commenter=$this->getUser();
        $annonce = $em->getRepository('CAFTANAppBundle:Annonce')->find($id);
        $comments = $em->getRepository('CAFTANAppBundle:Comment')->findBy(array('annonce'=>$annonce->getId()));
        $comment= new Comment();
        $message= new Message();
        $em = $this->getDoctrine()->getManager();
       $receiver=$annonce->getAnnonceur();
       //$sender=$this->getUser();
        $formBuilderm = $this->get('form.factory')->createBuilder(FormType::class, $message);
        $formBuilderm
                ->add('email', \Symfony\Component\Form\Extension\Core\Type\EmailType::class)
                ->add('subject', \Symfony\Component\Form\Extension\Core\Type\TextType::class)
                ->add('Content', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
                //->add('receiver', \CAFTAN\AppBundle\Form\AnnonceurType::class)
                ->add('send', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)

        ;
        $formm = $formBuilderm->getForm();
      
        
        
        
        
        
        
            
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $comment);

        $formBuilder
                ->add('comment', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
              
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)

        ;

        $form = $formBuilder->getForm();
        $form->handleRequest($req);
//         $formBS = $this->get('form.factory')->createBuilder(FormType::class, $annonce);
//        $formBS
//               
//                ->add('signaled', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
//
//        ;
//        $forms = $formBS->getForm();
        if($formm->isSubmitted() && $formm->isValid()){
            $em = $this->getDoctrine()->getManager();
            
            $message->setReceiver($receiver);
            //$message->setSender($sender);
            $em->persist($message);
            $em->flush();
            return $this->render('CAFTANAppBundle:Home:annonce.html.twig', array(
            'annonce' => $annonce, 
            'comments'=>$comments,
             //'forms'=>$forms->createView(),
            'userE'=>$utilisateurEncour,
            'form' => $form->createView(),
            'formm' => $formm->createView(),
            'id'=>$id
        ));
        }   
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $comment->setCommenter($commenter);
            $comment->setAnnonce($annonce);
            $em->persist($comment);
            $em->flush();
            return $this->render('CAFTANAppBundle:Home:annonce.html.twig', array(
            'annonce' => $annonce, 
            'comments'=>$comments,
            'userE'=>$utilisateurEncour,
            //'forms'=>$forms->createView(),
            'form' => $form->createView(),
            'formm' => $formm->createView(),
            'id'=>$id
        ));
//         return $this->redirectToRoute('caftan_app_annoncepage', array('id' => $annonce->getId()));
        }
        return $this->render('CAFTANAppBundle:Home:annonce.html.twig', array(
            'annonce' => $annonce,
            'comments'=>$comments,
            'userE'=>$utilisateurEncour,
            'id'=>$id,
//            'forms'=>$forms->createView(),
            'form' => $form->createView(),
            'formm' => $formm->createView()
        ));
        //formulaire pour signaler une annonce
//       
//        $forms->handleRequest($req);
//         if($forms->isSubmitted() && $forms->isValid()){
//            $em = $this->getDoctrine()->getManager();
//            $annonce->setSignaled(true);
//            $em->persist($annonce);
//            $em->flush();
//            return $this->render('CAFTANAppBundle:Home:annonce.html.twig', array(
//            'annonce' => $annonce, 
//            'comments'=>$comments,
//            'userE'=>$utilisateurEncour,
//            'forms'=>$forms->createView(),
//            'form' => $form->createView(),
//            'formm' => $formm->createView(),
//            'id'=>$id
//        ));
//        }  
       
    }
}


