<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function getEventById($id): array
    {
        $qb = $this->createQueryBuilder('event')
            ->where('event.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        
        return $qb->getArrayResult();
    }
}
