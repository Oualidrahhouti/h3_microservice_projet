<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductRepository;

final class DefaultController extends AbstractController{

    #[Route('/', name: 'home')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('default/home.html.twig', [
            'message' => 'Welcome to the Homepage!',
            'products' => $products,
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('default/about.html.twig', [
            'message' => 'This is the about page.',
        ]);
    }
}
