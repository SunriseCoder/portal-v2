<?php

namespace App\Repository\Tracker;

use App\Entity\Tracker\EventOperationStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EventOperationStatus>
 *
 * @method EventOperationStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventOperationStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventOperationStatus[]    findAll()
 * @method EventOperationStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventOperationStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventOperationStatus::class);
    }

    public function save(EventOperationStatus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EventOperationStatus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EventOperationStatuses[] Returns an array of EventOperationStatuses objects
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

//    public function findOneBySomeField($value): ?EventOperationStatuses
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
