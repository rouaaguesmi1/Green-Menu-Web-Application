<?php

namespace App\Repository;

use App\Entity\Restauranttable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Restauranttable>
 *
 * @method Restauranttable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Restauranttable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Restauranttable[]    findAll()
 * @method Restauranttable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestauranttableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Restauranttable::class);
    }

//    /**
//     * @return Restauranttable[] Returns an array of Restauranttable objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Restauranttable
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
