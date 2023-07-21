<?php

namespace App\Repository;

use App\Entity\DeailyResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DeailyResult>
 *
 * @method DeailyResult|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeailyResult|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeailyResult[]    findAll()
 * @method DeailyResult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeailyResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeailyResult::class);
    }

//    /**
//     * @return DeailyResult[] Returns an array of DeailyResult objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DeailyResult
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
