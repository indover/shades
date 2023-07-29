<?php

namespace App\Service;

use App\Repository\GalleryRepository;

class GalleryService
{
    public function __construct(
        private GalleryRepository $galleryRepository
    )
    {
    }

    public function getImages(string $limit = '999'): array
    {
        return $this->galleryRepository->findBy([], ['id' => 'ASC'], $limit);
    }
}