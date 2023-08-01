<?php

namespace App\Service;

use App\Repository\PromotionRepository;
use \App\Entity\Promotion;
use Doctrine\ORM\NonUniqueResultException;

class PromotionService
{
    public function __construct(private PromotionRepository $repository)
    {
    }

    /**
     * @return Promotion|null
     * @throws NonUniqueResultException
     */
    public function getPromotion(): ?Promotion
    {
        return $this->repository->getPromo();
    }
}