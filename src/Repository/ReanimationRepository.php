<?php

namespace App\Repository;

use App\Entity\Reanimation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reanimation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reanimation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reanimation[]    findAll()
 * @method Reanimation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReanimationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reanimation::class);
    }

    // /**
    //  * @return Reanimation[] Returns an array of Reanimation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reanimation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
