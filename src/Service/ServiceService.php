<?php

namespace App\Service;

use App\Repository\ServiceRepository;

class ServiceService
{
    public function __construct(
        private ServiceRepository $service
    )
    {
    }

    public function findAll(): array
    {
        return $this->service->findAll();
    }
}