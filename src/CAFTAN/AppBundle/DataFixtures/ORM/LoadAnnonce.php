<?php //
namespace CAFTAN\AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use CAFTAN\AppBundle\Entity\Annonce;


class LoadAnnonce extends AbstractFixture implements OrderedFixtureInterface {
    
    public function load(ObjectManager $manager)

  {

    // Liste des noms de catégorie à ajouter

  
   
         $annonce1=new Annonce();
         $annonce1-> setTitle('Takchita');
         $annonce1-> setNeuf(true);
         $annonce1-> setPrix('500');
         $annonce1-> setCreation('Safae Queuniet');
         $annonce1-> setDescr('Robe simple et chic en deux pièces satin et veloure une en beige et l\'autre en bordeaux. Avec des perles vert royale. taille standard.');
         $annonce1->setAnnonceur($this->getReference('user1'));
         $annonce1->setImage($this->getReference('image7'));
         $manager->persist($annonce1);
         
         $annonce2=new Annonce();
         $annonce2-> setTitle('Caftan');
         $annonce2-> setNeuf(false);
         $annonce2-> setPrix('600');
         $annonce2-> setCreation('Naima El Mahi');
         $annonce2-> setDescr('Robe simple et chic en deux pièces satin et veloure une en beige et l\'autre en bordeaux. Avec des perles vert royale. taille standard.');
         $annonce2->setAnnonceur($this->getReference('user2'));
         
         $annonce2->setImage($this->getReference('image8'));
         $manager->persist($annonce2);
         
         $annonce3=new Annonce();
         $annonce3-> setTitle('Caftan');
         $annonce3-> setNeuf(false);
         $annonce3-> setPrix('200');
         $annonce3-> setCreation('inconnu');
         $annonce3-> setDescr('Robe simple et chic en deux pièces satin et veloure une en beige et l\'autre en bordeaux. Avec des perles vert royale. taille standard.');
         $annonce3->setAnnonceur($this->getReference('user3'));
        
         $annonce3->setImage($this->getReference('image9'));
         $manager->persist($annonce3);
        
         $annonce4=new Annonce();
         $annonce4-> setTitle('Caftan');
         $annonce4-> setNeuf(false);
         $annonce4-> setPrix('300');
         $annonce4-> setCreation('inconnu');
         $annonce4-> setDescr('Robe simple et chic en deux pièces satin et veloure une en beige et l\'autre en bordeaux. Avec des perles vert royale. taille standard.');
         $annonce4->setAnnonceur($this->getReference('user4'));
        
         $annonce4->setImage($this->getReference('image10'));
         $manager->persist($annonce4);

         // On déclenche l'enregistrement de toutes les annonces

         $manager->flush();
         
         //ici je déclare les réferences pour chaque user pour faire les relations pour les prochains fixtures 
         $this->addReference('annonce1', $annonce1);
         $this->addReference('annonce2', $annonce2);
         $this->addReference('annonce3', $annonce3);
         $this->addReference('annonce4', $annonce4);

    

  }
    public function getOrder()
            {
              return 5;
            }
}
