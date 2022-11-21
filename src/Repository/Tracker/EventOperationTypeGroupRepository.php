<?php

namespace App\Repository\Tracker;

use App\Entity\Tracker\EventOperationTypeGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EventOperationTypeGroup>
 *
 * @method EventOperationTypeGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventOperationTypeGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventOperationTypeGroup[]    findAll()
 * @method EventOperationTypeGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventOperationTypeGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventOperationTypeGroup::class);
    }

    public function save(EventOperationTypeGroup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EventOperationTypeGroup $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EventOperationTypeGroup[] Returns an array of EventOperationTypeGroup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EventOperationTypeGroup
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
