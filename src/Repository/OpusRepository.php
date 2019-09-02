<?php

namespace App\Repository;

use App\Entity\Opus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Opus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Opus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Opus[]    findAll()
 * @method Opus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Opus::class);
    }

    // /**
    //  * @return Opus[] Returns an array of Opus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Opus
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
