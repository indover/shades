<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $title;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $discount;

    #[ORM\Column(type: "string", nullable: true)]
    private ?string $service;
    #[ORM\Column(type: "string", nullable: true)]
    private ?string $period;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    /**
     * @param string|null $discount
     */
    public function setDiscount(?string $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return string|null
     */
    public function getService(): ?string
    {
        return $this->service;
    }

    /**
     * @param string|null $service
     */
    public function setService(?string $service): void
    {
        $this->service = $service;
    }

    /**
     * @return string|null
     */
    public function getPeriod(): ?string
    {
        return $this->period;
    }

    /**
     * @param string|null $period
     */
    public function setPeriod(?string $period): void
    {
        $this->period = $period;
    }
}
