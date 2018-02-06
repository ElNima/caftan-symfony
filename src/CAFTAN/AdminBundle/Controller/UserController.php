<?php

namespace CAFTAN\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\User;

class UserController extends Controller
{
    public function showAction(Request $req)
    {
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:User');
        $users=$rep->findAll();
//        $annonces=$rep->getAnnoncesWithImageWithAnnonceurWithAdress();
        return $this->render('CAFTANAdminBundle:User:show.html.twig', array('users'=>$users));
    }
    public function createAction(Request $req){
        $user= new User();
        //$form = $this->createForm('CAFTAN\AppBundle\Form\UserType', $user);
        
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $yser);
        $formBuilder
                ->add('nom')
                ->add('prenom')
                ->add('createur')
                ->add('username')
                ->add('email')
                ->add('password')
                ->add('roles')
                ->add('parcour')
                ->add('image',  CAFTAN\AppBundle\Form\ImageType::class)
                ->add('adress', AdressType::class)
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
        $form = $formBuilder->getForm();
        $form->handleRequest($req);
        if( $form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($user);
            $em->persist($user->getImage());
            $em->persist($user->getAdress());
            $em->flush();
            return $this->redirectToRoute('caftan_admin_show_users');
        }
        return $this->render('CAFTANAdminBundle:User:update.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }
    
    public function updateAction(Request $req, $id){
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:User');
        $user=$rep->find($id);
      
        $form = $this->createForm('CAFTAN\AppBundle\Form\UserType', $user);
        $form->handleRequest($req);
        if( $form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            
            $em->flush();
            return $this->redirectToRoute('caftan_admin_show_users');
        }
        return $this->render('CAFTANAdminBundle:User:update.html.twig', array(
            'user' => $user,
            'id'=>$user->getId(),
            'form' => $form->createView(),
        ));
    }
    public function deleteAction(Request $req, $id){
         $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:User');
        $user=$rep->find($id);
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('caftan_admin_show_users');
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