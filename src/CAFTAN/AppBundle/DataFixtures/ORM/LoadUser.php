<?php
namespace CAFTAN\AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use CAFTAN\AppBundle\Entity\User;


class LoadUser extends AbstractFixture implements OrderedFixtureInterface{
    
    public function load(ObjectManager $manager)

  {
    
         $user1=new User();
         $user1->setUsername('safaa');
         $user1-> setNom('Queent');
         $user1-> setPrenom('Safaa');
         $user1-> setEmail('safaa.quent@gmail.com');
         $user1->setPassword('safaaquent');
         $user1->setRoles(['ROLE_USER']);
         $user1-> setGenre('F');
         $user1-> setCreateur(true);
         $user1->setParcour('Safaa Queuniet, Créatrice pleine de talent domiciliée à Montpellier, la franco-marocaine Safaa Queuniet nous présente des pièces raffinées et élégantes. Parfois traditionnelle, parfois ultra-moderne, la jeune Safaa brille par son art : une création qui se veut moderne mais respectant les traditions du caftan');
         $user1-> setImage($this->getReference('image12'));//recupérer...
         $user1-> setAdress($this->getReference('adress6'));
        /* $user1->setAnnonces($this->getReference('annonce1'));
         $user1->setAnnonces($this->getReference('annonce2'));*/
         
         $manager->persist($user1);
         
         $user2=new User();
         $user2->setUsername('nime');
         $user2-> setNom('El Mahi');
         $user2-> setPrenom('Naima');
         $user2-> setEmail('elmahinima@gmail.com');
         $user2->setPassword('naimaelmahi');
         $user2->setRoles(['ROLE_ADMIN']);
         $user2-> setGenre('F');
         $user2-> setCreateur(true);
         $user2->setParcour('');
         $user2-> setImage($this->getReference('image13'));//recupérer...
         $user2-> setAdress($this->getReference('adress1'));
        /* $user2->setAnnonces($this->getReference('annonce3'));
         $user2->setAnnonces($this->getReference('annonce4'));*/
         $manager->persist($user2);
         
         $user3=new User();
         $user3-> setUsername('chaimaa');
         $user3-> setNom('Bouziani');
         $user3-> setPrenom('Chaimaa');
         $user3-> setEmail('chaimaa.bouziani@gmail.com');
         $user3->setPassword('chaimaabouziani');
         $user3->setRoles(['ROLE_USER']);
         $user3-> setGenre('F');
         $user3-> setCreateur(false);
         $user3-> setImage($this->getReference('image14'));//recupérer...
         $user3-> setAdress($this->getReference('adress2'));
         $manager->persist($user3);
         
         $user4=new User();
         $user4->setUsername('bouchra');
         $user4-> setNom('Kadaouine');
         $user4-> setPrenom('Bouchra');
         $user4-> setEmail('bouchra.kadouine@gmail.com');
         $user4->setPassword('bouchrakadouine');
         $user4->setRoles(['ROLE_USER']);
         $user4-> setGenre('F');
         $user4-> setCreateur(false);
         $user4-> setImage($this->getReference('image15'));
         $user4-> setAdress($this->getReference('adress3'));
         $manager->persist($user4);
    


    // On déclenche l'enregistrement de toutes les annonces

         $manager->flush();
         //ici je déclare les réferences pour chaque user pour faire les relations pour les prochains fixtures 
         $this->addReference('user1', $user1);
         $this->addReference('user2', $user2);
         $this->addReference('user3', $user3);
         $this->addReference('user4', $user4);
        
       

  }
    public function getOrder()
            {
              return 4;
            }
}
   