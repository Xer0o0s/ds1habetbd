<?php

namespace App\Repository;

use App\Entity\OperationRechagement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OperationRechagement>
 *
 * @method OperationRechagement|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperationRechagement|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperationRechagement[]    findAll()
 * @method OperationRechagement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperationRechagementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperationRechagement::class);
    }

//    /**
//     * @return OperationRechagement[] Returns an array of OperationRechagement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OperationRechagement
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
