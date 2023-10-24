<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('pages/articles/index.html.twig', [
            'controller_name' => 'ArticlesController',
            'articles' => $articleRepository->findBy([], ['datePublication' => 'DESC'])
        ]);
    }
}
