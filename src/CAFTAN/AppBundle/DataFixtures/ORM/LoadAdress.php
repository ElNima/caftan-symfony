<?php //
namespace CAFTAN\AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use CAFTAN\AppBundle\Entity\Adress;

class LoadAdress extends AbstractFixture implements OrderedFixtureInterface
        {
    
    public function load(ObjectManager $manager)

  {
     
    
         $adress1=new Adress();
         $adress1-> setCp('4020');
         $adress1-> setLocalite('Liège');
         $adress1-> setPays('Belgique');
         $manager->persist($adress1);
         
         $adress2=new Adress();
         $adress2-> setCp('59000');
         $adress2-> setLocalite('Lille');
         $adress2-> setPays('France');
         $manager->persist($adress2);
         
         $adress3=new Adress();
         $adress3-> setCp('2030');
         $adress3-> setLocalite('Anvers');
         $adress3-> setPays('Belgique');
         $manager->persist($adress3);
         
         $adress4=new Adress();
         $adress4-> setCp('1020');
         $adress4-> setLocalite('Bruxelles');
         $adress4-> setPays('Belgique');
         $manager->persist($adress4);
         
         $adress5=new Adress();
         $adress5-> setCp('3581 CD');
         $adress5-> setLocalite('Maastricht');
         $adress5-> setPays('Pays-bas');
         $manager->persist($adress5);
         
         $adress6=new Adress();
         $adress6-> setCp('34090');
         $adress6-> setLocalite('Montpellier');
         $adress6-> setPays('France');
         $manager->persist($adress6);
    
        // On déclenche l'enregistrement de toutes les adresses

         $manager->flush();
         
         //ici je déclare les réferences pour chaque user pour faire les relations pour les prochains fixtures 
         $this->addReference('adress1', $adress1);
         $this->addReference('adress2', $adress2);
         $this->addReference('adress3', $adress3);
         $this->addReference('adress4', $adress4);
         $this->addReference('adress5', $adress5);
         $this->addReference('adress6', $adress6);
  }
    public function getOrder()
            {
              return 0;
            }
}
