<?php

namespace App\Repository;

use App\Entity\ParticipatesIn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ParticipatesIn|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParticipatesIn|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParticipatesIn[]    findAll()
 * @method ParticipatesIn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipatesInRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParticipatesIn::class);
    }

    // /**
    //  * @return ParticipatesIn[] Returns an array of ParticipatesIn objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParticipatesIn
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
