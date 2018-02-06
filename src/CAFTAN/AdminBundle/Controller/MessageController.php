<?php

namespace CAFTAN\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\Message;

class MessageController extends Controller
{
    public function showAction(Request $req)
    {
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Message');
        $messages=$rep->findAll();
//        $annonces=$rep->getAnnoncesWithImageWithAnnonceurWithAdress();
        return $this->render('CAFTANAdminBundle:Message:show.html.twig', array('messages'=>$messages));
    }
    
    
   
    public function deleteAction(Request $req, $id){
         $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Message');
        $message=$rep->find($id);
        $em->remove($message);
        $em->flush();
        return $this->redirectToRoute('caftan_admin_show_messages');
    }
//    private function createDeleteForm(Annonce $adresse)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('caftan_admin_delete_adresses', array('id' => $adresse->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}