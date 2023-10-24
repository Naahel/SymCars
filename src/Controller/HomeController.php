<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {
    #[Route('/', name: 'home.index', methods : ['GET'])]
    public function index(ArticleRepository $articleRepository, CategorieRepository $categorieRepository): Response {
        return $this->render('pages/home.html.twig', [
            'article' => $articleRepository->findOneBy([], ['datePublication' => 'DESC']),
            'categories' => $categorieRepository->findAll(),
        ]);
    }
}