<?php

namespace App\Repository;

use App\Entity\CvFields;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CvFields|null find($id, $lockMode = null, $lockVersion = null)
 * @method CvFields|null findOneBy(array $criteria, array $orderBy = null)
 * @method CvFields[]    findAll()
 * @method CvFields[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CvFieldsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CvFields::class);
    }

    // /**
    //  * @return CvFields[] Returns an array of CvFields objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CvFields
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
