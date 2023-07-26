<?php

namespace App\Repository;

use App\Entity\Service;
use App\Entity\ServiceItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServiceItem>
 *
 * @method ServiceItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceItem[]    findAll()
 * @method ServiceItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceItem::class);
    }
    public function getItemsArray(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s.id, s.name, s.price, s.length, service.name as service_name, service.title as service_title')
            ->innerJoin(Service::class, 'service', Join::WITH, 'service.id = s.service')
            ->getQuery()
            ->getArrayResult();
    }

//    public function findOneBySomeField($value): ?ServiceItem
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
