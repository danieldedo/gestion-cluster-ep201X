<?php

namespace App\Repository;

use App\Entity\Clusters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Clusters>
 *
 * @method Clusters|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clusters|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clusters[]    findAll()
 * @method Clusters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClustersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clusters::class);
    }

//    /**
//     * @return Clusters[] Returns an array of Clusters objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Clusters
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
