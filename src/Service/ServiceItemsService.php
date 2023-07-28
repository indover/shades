<?php

namespace App\Service;

use App\Repository\ServiceItemRepository;

class ServiceItemsService
{
    public function __construct(
        private ServiceItemRepository $itemRepository
    )
    {
    }

    public function findAll(): array
    {
        return $this->itemRepository->findAll();
    }

    public function getAndGroupItems(): array
    {
        $items = $this->itemRepository->getItemsArray();
        $array = [];

        foreach ($items as $item) {
            $array[$item['service_name']][] = $item;
        }

        return $array;
    }
}