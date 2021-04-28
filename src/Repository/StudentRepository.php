<?php

namespace App\Repository;

use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Student|null find($id, $lockMode = null, $lockVersion = null)
 * @method Student|null findOneBy(array $criteria, array $orderBy = null)
 * @method Student[]    findAll()
 * @method Student[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Student::class);
    }

    /**
     * @return Student[] Returns an array of Student objects
     */

    public function findByUsername($value)
    {
        return $this->createQueryBuilder('student')
            ->andWhere('student.username like :val')
            ->setParameter('val', '%'.$value.'%')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return String[] Returns an array of Student objects
     */

    public function getUsernames()
    {
        return $this->createQueryBuilder('student')
            ->select('student.username')
            ->orderBy('student.username')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return int[] Returns an array of Student objects
     */

    public function getIds()
    {
        return $this->createQueryBuilder('student')
            ->select('student.id')
            ->orderBy('student.username')
            ->getQuery()
            ->getResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?Student
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
