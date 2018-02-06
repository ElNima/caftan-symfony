<?php

namespace CAFTAN\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\Adress;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdressController extends Controller
{
    public function showAction(Request $req)
    {
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Adress');
        $adresses=$rep->findAll();
//        $annonces=$rep->getAnnoncesWithImageWithAnnonceurWithAdress();
        return $this->render('CAFTANAdminBundle:Adress:show.html.twig', array('adresses'=>$adresses));
    }
    public function createAction(Request $req){
        $adresse= new Adress();
//        $form = $this->createForm('CAFTAN\AppBundle\Form\AdressType', $adresse);
//        $form->handleRequest($req);
        
    $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $adresse);
    $formBuilder

      ->add('cp', TextType::class)

      ->add('localite',   TextType::class)

      ->add('pays',   TextType::class)

      ->add('save',   SubmitType::class)

    ;

    $form = $formBuilder->getForm();
    $form->handleRequest($req);
        if( $form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($adresse);
            $em->flush();
            return $this->redirectToRoute('caftan_admin_show_adresses');
        }
        return $this->render('CAFTANAdminBundle:Adress:update.html.twig', array(
            'adresse' => $adresse,
            'form' => $form->createView(),
        ));
    }
    
    public function updateAction(Request $req, $id){
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Adress');
        $adresse=$rep->find($id);
      
        $form = $this->createForm('CAFTAN\AppBundle\Form\AdressType', $adresse);
        $form->handleRequest($req);
        if( $form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            
            $em->flush();
            return $this->redirectToRoute('caftan_admin_show_adresses');
        }
        return $this->render('CAFTANAdminBundle:Adress:update.html.twig', array(
            'adresse' => $adresse,
            'id'=>$adresse->getId(),
            'form' => $form->createView(),
        ));
    }
    public function deleteAction(Request $req, $id){
        
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Adress');
        $adresse=$rep->find($id);
        $em->remove($adresse);
        $em->flush();
        return $this->redirectToRoute('caftan_admin_show_adresses');
        
    }
//         $form = $this->createDeleteForm($adresse);
//        $form->handleRequest($req);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($adresse);
//            $em->flush();
//             return $this->redirectToRoute('caftan_admin_show_adresses');
//        }
//
//        return $this->redirectToRoute('caftan_admin_delete_adresses');
//    }
//    private function createDeleteForm(Annonce $adresse)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('caftan_admin_delete_adresses', array('id' => $adresse->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}