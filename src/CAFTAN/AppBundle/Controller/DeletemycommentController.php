<?php

namespace CAFTAN\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class DeletemycommentController extends Controller
{
   
    public function deleteAction($id, Request $req){
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('CAFTANAppBundle:Comment');
        $comment = $rep->findOneBy(array('commenter'=>$id));
        
     
        
        if($comment->getCreateur() != null){
        $em->remove($comment);
        $em->flush();
        return $this->redirectToRoute('caftan_app_createurpage', array('id'=>$comment->getCreateur()->getId()));
        }else if($comment->getAnnonce() != null){
        
        $em->remove($comment);
        $em->flush();
        
        return $this->redirectToRoute('caftan_app_annoncepage', array('id'=>$comment->getAnnonce()->getId()));
            
        }
       }
}


