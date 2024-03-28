<?php

namespace App\Repository;

use App\Entity\GroceryListItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GroceryListItem>
 *
 * @method GroceryListItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroceryListItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroceryListItem[]    findAll()
 * @method GroceryListItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroceryListItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroceryListItem::class);
    }

    //    /**
    //     * @return GroceryListItem[] Returns an array of GroceryListItem objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?GroceryListItem
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
