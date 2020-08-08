<?php

declare(strict_types=1);

namespace App\Adapter\Doctrine\Repository;

use App\Entity\Offer;
use App\Gateway\OfferGateway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Offer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offer[]    findAll()
 * @method Offer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferRepository extends ServiceEntityRepository implements OfferGateway
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    public function publish(Offer $offer): void
    {
        $this->_em->persist($offer);
        $this->_em->flush();
    }
}
