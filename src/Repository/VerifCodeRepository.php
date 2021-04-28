<?php

namespace App\Repository;

use App\Entity\Verifcode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Verifcode|null find($id, $lockMode = null, $lockVersion = null)
 * @method Verifcode|null findOneBy(array $criteria, array $orderBy = null)
 * @method Verifcode[]    findAll()
 * @method Verifcode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerifCodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Verifcode::class);
    }

    // /**
    //  * @return Verifcode[] Returns an array of Verifcode objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Verifcode
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
