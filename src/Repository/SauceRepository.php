<?php

namespace App\Repository;

use App\Entity\Sauce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SauceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sauce::class);
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('s')
            ->getQuery()
            ->getResult();
    }
}

?>
