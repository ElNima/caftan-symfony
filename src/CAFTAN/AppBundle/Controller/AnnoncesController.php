<?php

namespace CAFTAN\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnnoncesController extends Controller
{
    public function indexAction($page)
    {
        

       
        if ($page < 1) {

      throw $this->createNotFoundException("La page ".$page." n'existe pas.");

    }


    // Ici je fixe le nombre d'annonces par page à 3

    // Mais bien sûr il faudrait utiliser un paramètre, et y accéder via $this->container->getParameter('nb_per_page')

    $nbPerPage = 4;


    // On récupère notre objet Paginator

    $adverts = $this->getDoctrine()

      ->getManager()

      ->getRepository('CAFTANAppBundle:Annonce')

      ->getAdverts($page, $nbPerPage)

    ;


    // On calcule le nombre total de pages grâce au count($listAdverts) qui retourne le nombre total d'annonces

    $nbPages = ceil(count($adverts) / $nbPerPage);


    // Si la page n'existe pas, on retourne une 404

    if ($page > $nbPages) {

      throw $this->createNotFoundException("La page ".$page." n'existe pas.");

    }


    // On donne toutes les informations nécessaires à la vue

//    return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
//
//      'listAdverts' => $listAdverts,
//
//      'nbPages'     => $nbPages,
//
//      'page'        => $page,
//
//    ));
    return $this->render('CAFTANAppBundle:Home:annonces.html.twig', array(
        'adverts' => $adverts,

      'nbPages'     => $nbPages,

      'page'        => $page,
    ));
  
    }
}


