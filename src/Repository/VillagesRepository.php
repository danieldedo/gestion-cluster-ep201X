<?php

namespace App\Repository;

use App\Entity\Villages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Villages>
 *
 * @method Villages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Villages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Villages[]    findAll()
 * @method Villages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VillagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Villages::class);
    }

//    /**
//     * @return Villages[] Returns an array of Villages objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Villages
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
