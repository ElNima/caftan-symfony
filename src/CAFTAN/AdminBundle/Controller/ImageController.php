<?php

namespace CAFTAN\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CAFTAN\AppBundle\Entity\Image;

class ImageController extends Controller
{
    public function showAction(Request $req)
    {
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Image');
        $images=$rep->findAll();
//        $annonces=$rep->getAnnoncesWithImageWithAnnonceurWithAdress();
        return $this->render('CAFTANAdminBundle:Image:show.html.twig', array('images'=>$images));
    }
    public function createAction(Request $req){
        $image= new Image();
//         $formBuilder = $this->get('form.factory')->createBuilder(\Symfony\Component\Form\Extension\Core\Type\FormType::class, $image);
//         $formBuilder
//
//              ->add('alt', \Symfony\Component\Form\Extension\Core\Type\TextType::class)
//
////              ->add('url', \Symfony\Component\Form\Extension\Core\Type\UrlType::class)
////
////              ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
        
        $form = $this->createForm('CAFTAN\AppBundle\Form\ImageType', $image);

            ;

    //$form = $formBuilder->getForm();
    $form->handleRequest($req);
        if( $form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();
            return $this->redirectToRoute('caftan_admin_show_images', array('id' => $image->getId()));
        }
        return $this->render('CAFTANAdminBundle:Image:update.html.twig', array(
            'image' => $image,
            'form' => $form->createView(),
        ));
    }
    
    public function updateAction(Request $req, $id){
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Image');
        $image=$rep->find($id);
        //dump($image);
        //$lastImg=$image->getFile();
        
        $form = $this->createForm('CAFTAN\AppBundle\Form\ImageType', $image);
        $form->handleRequest($req);
       // $form->setData($lastImg);
        if( $form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            
            $em->flush();
            return $this->redirectToRoute('caftan_admin_show_images');
        }
        return $this->render('CAFTANAdminBundle:Image:update.html.twig', array(
            'adresse' => $image,
            'id'=>$image->getId(),
            'form' => $form->createView(),
        ));
    }
    public function deleteAction(Request $req, $id){
        $em=$this->getDoctrine()->getManager();
        $rep=$em->getRepository('CAFTANAppBundle:Image');
        $img=$rep->find($id);
        $em->remove($img);
        $em->flush();
        return $this->redirectToRoute('caftan_admin_show_images');
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