<?php

namespace CAFTAN\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\Comment;

class CommentController extends Controller
{
    public function showAction(Request $req)
    {
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Comment');
        $comments=$rep->findAll();
//        $annonces=$rep->getAnnoncesWithImageWithAnnonceurWithAdress();
        return $this->render('CAFTANAdminBundle:Comment:show.html.twig', array('comments'=>$comments));
    }
    public function deleteAction($id, Request $req)
    {
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Comment');
        $comment=$rep->find($id);
        $em->remove($comment);
        $em->flush();
        return $this->redirectToRoute('caftan_admin_show_comments');
    }
    /*public function createAction(Request $req){
        $comment= new Comment();
        $commenter = $this->get('security.authentication_utils')->getLastUsername();
        $formBuilder = $this->get('form.factory')->createBuilder(\Symfony\Component\Form\Extension\Core\Type\FormType::class, $comment);

        $formBuilder
                ->add('commenter', \CAFTAN\AppBundle\Form\UserType::class, [
                    'data_class' => $commenter
                ])
                ->add('createur', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'CAFTANAppBundle:User',
                    'block_name' => 'nom',
                    'multiple' => false
                ))
                ->add('annonce', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'CAFTANAppBundle:Annonce',
                    'block_name' => 'title',
                    'multiple' => false
                ))
                ->add('comment', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
                
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)

        ;

        $form = $formBuilder->getForm();
        $form->handleRequest($req);
        if( $form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
        
            $em->persist($comment);
            $em->persist($comment->getCommenter());
            $em->persist($comment->getCommenter()->getAdress());
            $em->persist($comment->getCommenter()->getImage());            
            $em->persist($comment->getAnnonce());
            $em->persist($comment->getAnnonce()->getAnnonceur());
            $em->persist($comment->getAnnonce()->getImage());
            $em->persist($comment->getAnnonce()->getAnnonceur()->getAdress());
            $em->persist($comment->getAnnonce()->getAnnonceur()->getImage());
            $em->persist($comment->getCreateur());
            $em->persist($comment->getCreateur()->getAdress());
            $em->persist($comment->getCreateur()->getImage());
            $em->flush();
            return $this->redirectToRoute('caftan_admin_show_comments');
        }
        return $this->render('CAFTANAdminBundle:Comment:update.html.twig', array(
            'comment' => $comment,
            'form' => $form->createView(),
        ));
    }*/
    
    /*public function updateAction(Request $req, $id){
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Comment');
        $comment=$rep->find($id);
      
        $form = $this->createForm('CAFTAN\AppBundle\Form\CommentType', $comment);
        $form->handleRequest($req);
        if( $form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            
            $em->flush();
            return $this->redirectToRoute('caftan_admin_show_comments');
        }
        return $this->render('CAFTANAdminBundle:Comment:update.html.twig', array(
            'comment' => $comment,
            'id'=>$comment->getId(),
            'form' => $form->createView(),
        ));
    }
    public function deleteAction(Request $req, $id){
         $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Comment');
        $comment=$rep->find($id);
        $em->remove($comment);
        $em->flush();
        return $this->redirectToRoute('caftan_admin_show_comments');
    }*/
//    private function createDeleteForm(Annonce $adresse)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('caftan_admin_delete_adresses', array('id' => $adresse->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}