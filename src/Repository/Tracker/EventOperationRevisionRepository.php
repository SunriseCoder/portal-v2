<?php

namespace App\Repository\Tracker;

use App\Entity\Tracker\EventOperationRevision;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EventOperationRevision>
 *
 * @method EventOperationRevision|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventOperationRevision|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventOperationRevision[]    findAll()
 * @method EventOperationRevision[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventOperationRevisionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventOperationRevision::class);
    }

    public function save(EventOperationRevision $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EventOperationRevision $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EventOperationHistory[] Returns an array of EventOperationHistory objects
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

//    public function findOneBySomeField($value): ?EventOperationHistory
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
