<?php

namespace App\Repository;

use App\Entity\CarShowroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarShowroom|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarShowroom|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarShowroom[]    findAll()
 * @method CarShowroom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarShowroomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarShowroom::class);
    }

    // /**
    //  * @return CarShowroom[] Returns an array of CarShowroom objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarShowroom
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
