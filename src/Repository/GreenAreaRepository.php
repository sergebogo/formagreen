<?php

namespace App\Repository;

use App\Entity\GreenArea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GreenArea|null find($id, $lockMode = null, $lockVersion = null)
 * @method GreenArea|null findOneBy(array $criteria, array $orderBy = null)
 * @method GreenArea[]    findAll()
 * @method GreenArea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GreenAreaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GreenArea::class);
    }

    // /**
    //  * @return GreenArea[] Returns an array of GreenArea objects
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
    public function findOneBySomeField($value): ?GreenArea
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
