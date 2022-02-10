<?php

namespace App\Repository;

use App\Entity\PetrolStation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PetrolStation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PetrolStation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PetrolStation[]    findAll()
 * @method PetrolStation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PetrolStationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PetrolStation::class);
    }

    // /**
    //  * @return PetrolStation[] Returns an array of PetrolStation objects
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
    public function findOneBySomeField($value): ?PetrolStation
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
