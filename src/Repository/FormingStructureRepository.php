<?php

namespace App\Repository;

use App\Entity\FormingStructure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormingStructure|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormingStructure|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormingStructure[]    findAll()
 * @method FormingStructure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormingStructureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormingStructure::class);
    }

    // /**
    //  * @return FormingStructure[] Returns an array of FormingStructure objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormingStructure
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
