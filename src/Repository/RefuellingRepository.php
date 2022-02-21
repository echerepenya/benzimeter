<?php

namespace App\Repository;

use App\Entity\Refuelling;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Refuelling|null find($id, $lockMode = null, $lockVersion = null)
 * @method Refuelling|null findOneBy(array $criteria, array $orderBy = null)
 * @method Refuelling[]    findAll()
 * @method Refuelling[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefuellingRepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 3;
    
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Refuelling::class);
    }

    public function getRefuellingPaginator(int $offset)
    {
        $query = $this->createQueryBuilder('r')
            ->orderBy('r.createdAt', 'DESC')
            ->setMaxResults(self::PAGINATOR_PER_PAGE)
            ->setFirstResult($offset)
            ->getQuery();

        return new Paginator($query);
    }

    // /**
    //  * @return Refuelling[] Returns an array of Refuelling objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Refuelling
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
