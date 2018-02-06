<?php

namespace CAFTAN\AppBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    
        public function myFindOneCreateurById($id)

        {

          $qb = $this->createQueryBuilder('c');


          $qb

            ->where('c.id = :id')
                ->setParameter('id', $id)
            ->andWhere('c.createur=true')
              


          ;


          return $qb

            ->getQuery()

            ->getResult()

          ;

        }
}
