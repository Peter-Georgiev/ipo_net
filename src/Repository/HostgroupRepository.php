<?php

namespace App\Repository;

use App\Entity\Hostgroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Hostgroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hostgroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hostgroup[]    findAll()
 * @method Hostgroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HostgroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hostgroup::class);
    }

    // /**
    //  * @return Hostgroup[] Returns an array of Hostgroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hostgroup
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
