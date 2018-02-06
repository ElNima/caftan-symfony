<?php //
namespace CAFTAN\AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use CAFTAN\AppBundle\Entity\Image;

class LoadImage extends AbstractFixture implements OrderedFixtureInterface{
    
    public function load(ObjectManager $manager)

  {

    // Liste des noms de catégorie à ajouter
        
        

         $image1=new Image();
         $image1-> setUrl('../../../web/images/slider/slide1.PNG');
         $image1-> setAlt('slide image1');
         $manager->persist($image1);
         
         $image2=new Image();
         $image2-> setUrl('../../../web/images/slider/slide2.jpg');
         $image2-> setAlt('slide image2');
         $manager->persist($image2);
         
         $image3=new Image();
         $image3-> setUrl('../../../web/images/slider/slide3.jpg');
         $image3-> setAlt('slide image3');
         $manager->persist($image3);

         $image4=new Image();
         $image4-> setUrl('../../../web/images/slider/thumb1.png');
         $image4-> setAlt('slide thumb1');
         $manager->persist($image4);
         
         $image5=new Image();
         $image5-> setUrl('../../../web/images/slider/thumb2.jpg');
         $image5-> setAlt('slide thumb2');
         $manager->persist($image5);
         
         $image6=new Image();
         $image6-> setUrl('../../../web/images/slider/thumb3.jpg');
         $image6-> setAlt('slide thumb3');
         $manager->persist($image6);
         
         $image7=new Image();
         $image7-> setUrl('../../../web/images/products/robe1.jpg');
         $image7-> setAlt('takchita');
         $manager->persist($image7);
         
         $image8=new Image();
         $image8-> setUrl('../../../web/images/products/robe2.jpg');
         $image8-> setAlt('Caftan');
         $manager->persist($image8);
         
         $image9=new Image();
         $image9-> setUrl('../../../web/images/products/product3.jpg');
         $image9-> setAlt('Caftan');
         $manager->persist($image9);
         
         $image10=new Image();
         $image10-> setUrl('../../../web/images/products/product4.jpg');
         $image10-> setAlt('Takchita');
         $manager->persist($image10);
         
         $image11=new Image();
         $image11-> setUrl('../../../web/images/products/product5.jpg');
         $image11-> setAlt('Caftan');
         $manager->persist($image11);
        
         $image12=new Image();
         $image12-> setUrl('../../../web/images/nosCreateurs/createur1.png');
         $image12-> setAlt('Créateur image');
         $manager->persist($image12);

         $image13=new Image();
         $image13-> setUrl('../../../web/images/nosCreateurs/createur2.jpeg');
         $image13-> setAlt('Créateur image');
         $manager->persist($image13);
         
         $image14=new Image();
         $image14-> setUrl('../../../web/images/nosCreateurs/createur3.png');
         $image14-> setAlt('Créateur image');
         $manager->persist($image14);
         
         $image15=new Image();
         $image15-> setUrl('../../../web/images/nosCreateurs/createur4.png');
         $image15-> setAlt('Créateur image');
         $manager->persist($image15);
         
         $image16=new Image();
         $image16-> setUrl('../../../web/images/nosCreateurs/noProfil.jpg');
         $image16-> setAlt('profile no image');
         $manager->persist($image16);
         
    // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
         //ici je déclare les réferences pour chaque user pour faire les relations pour les prochains fixtures 
         $this->addReference('image1', $image1);
         $this->addReference('image2', $image2);
         $this->addReference('image3', $image3);
         $this->addReference('image4', $image4);
         $this->addReference('image5', $image5);
         $this->addReference('image6', $image6);
         $this->addReference('image7', $image7);
         $this->addReference('image8', $image8);
         $this->addReference('image9', $image9);
         $this->addReference('image10', $image10);
         $this->addReference('image11', $image11);
         $this->addReference('image12', $image12);
         $this->addReference('image13', $image13);
         $this->addReference('image14', $image14);
         $this->addReference('image15', $image15);
         $this->addReference('image16', $image16);
   
       
  }
    // cette fct a pour objectif de dire que celle-ci qu'il faut retourner en 1er
         function getOrder(){
             return 1;
         }
}
