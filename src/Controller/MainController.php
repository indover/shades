<?php

namespace App\Controller;

use App\Service\ServiceItemsService;
use App\Service\ServiceService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public function __construct(
        private ServiceService $service,
        private ServiceItemsService $itemsService
    )
    {
    }

    #[Route('/')]
    public function index(): Response
    {
        return $this->render('@Twig/main/index.html.twig');
    }

    #[Route ('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('@Twig/main/about.html.twig');
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
}