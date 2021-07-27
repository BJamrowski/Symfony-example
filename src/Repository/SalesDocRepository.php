<?php

namespace App\Repository;

use App\Entity\SalesDoc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SalesDoc|null find($id, $lockMode = null, $lockVersion = null)
 * @method SalesDoc|null findOneBy(array $criteria, array $orderBy = null)
 * @method SalesDoc[]    findAll()
 * @method SalesDoc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalesDocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SalesDoc::class);
    }

    // /**
    //  * @return SalesDoc[] Returns an array of SalesDoc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SalesDoc
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
