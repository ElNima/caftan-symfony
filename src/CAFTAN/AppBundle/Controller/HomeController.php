<?php

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CAFTAN\AppBundle\Entity\Annonce;
use CAFTAN\AppBundle\Entity\Search;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function indexAction(Request $req)
    {
        $em = $this->getDoctrine()->getManager();
        //Recherche filtrée
//        $search= new Search();
//        
//        $form = $this->createForm('CAFTAN\AppBundle\Form\SearchType', $search);
//        $form->handleRequest($req);      
       $search= new Search();
       $form = $this->createForm('CAFTAN\AppBundle\Form\SearchType', $search);
      
        $form->handleRequest($req);  
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
           $searchResults= $em->getRepository('CAFTANAppBundle:Annonce')->findBySearch($search);
           // $searchResults= $em->getRepository('CAFTANAppBundle:Search')->findBy(array('cp'=>$search->getCp(), 'prix'=>$search->getPrix(), 'neuf'=>$search->getNeuf()));

           return $this->render('CAFTANAppBundle:Home:recherche.html.twig', array(
            'searchResults'=>$searchResults
        ));
        }
        
        
        
        
        
       
        $recentAdverts = $em->getRepository('CAFTANAppBundle:Annonce')-> findBy(

                 array('signaled' => false), // Critere

                array('createdAt' => 'desc'),        // Tri

                4                           // Limite
              );   
        
        $recentCreaters = $em->getRepository('CAFTANAppBundle:User')-> findBy(

                 array('createur' => true), // Critere

                array('id' => 'asc'),        // Tri

                8                           // Limite
              ); 
        
        return $this->render('CAFTANAppBundle:Home:index.html.twig', array(
            'adverts' => $recentAdverts, 'createurs'=>$recentCreaters, 'form'=>$form->createView()
        ));
        
   
    }
}
