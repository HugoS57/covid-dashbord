<?php

namespace App\Repository;

use App\Entity\Gueris;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gueris|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gueris|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gueris[]    findAll()
 * @method Gueris[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuerisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gueris::class);
    }

    // /**
    //  * @return Gueris[] Returns an array of Gueris objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gueris
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
