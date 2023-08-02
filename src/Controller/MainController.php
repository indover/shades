<?php

namespace App\Controller;

use App\Service\GalleryService;
use App\Service\PromotionService;
use App\Service\ServiceItemsService;
use App\Service\ServiceService;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public function __construct(
        private ServiceService $service,
        private ServiceItemsService $itemsService,
        private GalleryService $galleryService,
        private PromotionService $promotionService
    )
    {
    }

    /**
     * @throws NonUniqueResultException
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('@Twig/main/index.html.twig', [
            'items' => $this->itemsService->getAndGroupItems(),
            'images' => $this->galleryService->getImages(6),
            'promotion' => $this->promotionService->getPromotion(),
        ]);
    }

    #[Route ('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('@Twig/main/about.html.twig', [
            'images' => $this->galleryService->getImages(6),
        ]);
    }

    #[Route ('/team', name: 'team')]
    public function team(): Response
    {
        return $this->render('@Twig/main/team.html.twig');
    }

    #[Route ('/price', name: 'price')]
    public function price(): Response
    {
        return $this->render('@Twig/main/price.html.twig', [
            'items' => $this->itemsService->getAndGroupItems()
        ]);
    }

    #[Route ('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('@Twig/main/contact.html.twig');
    }

    #[Route ('/gallery', name: 'gallery')]
    public function gallery(): Response
    {
        return $this->render('@Twig/main/gallery.html.twig', [
            'images' => $this->galleryService->getImages()
        ]);
    }

    #[Route ('/privacy', name: 'privacy')]
    public function privacy(): Response
    {
        return $this->render('@Twig/main/privacy.html.twig');
    }

    #[Route ('/terms', name: 'terms')]
    public function terms(): Response
    {
        return $this->render('@Twig/main/terms.html.twig');
    }
}