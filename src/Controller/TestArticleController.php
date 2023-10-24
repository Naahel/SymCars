<?php

namespace App\Controller;

use App\Entity\Article;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestArticleController extends AbstractController
{
    #[Route('/test/article', name: 'app_test_article')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $article1 = new Article();
        $article1->setTitre('Why Asteroids Taste Like Bacon');
        $article1->setTexte('Scientists have discovered that asteroids taste like bacon, eggs and sausages. They have also discovered that asteroids are not empty, but filled with a dry crunchy breakfast cereal.');
        $article1->setAuteur('John Doe');
        $article1->setDatePublication(new DateTime());
        $article1->setImage('asteroid.jpeg');
        $entityManager->persist($article1);

        $article2 = new Article();
        $article2->setTitre('Life on Planet Mercury, It\'s Hot!');
        $article2->setTexte('Scientists have discovered that Mercury is actually the closest planet to the sun. As a result, it is really hot there. But it has a great view of the sun.');
        $article2->setAuteur('John Doe');
        $article2->setDatePublication(new DateTime());
        $article2->setImage('mercury.jpeg');
        $entityManager->persist($article2);

        $article3 = new Article();
        $article3->setTitre('Pluto Demoted Again!');
        $article3->setTexte('Scientists have decided that Pluto is not a planet. It is actually a large asteroid. It is so small that you can eat it in just one bite.');
        $article3->setAuteur('John Doe');
        $article3->setDatePublication(new DateTime());
        $article3->setImage('pluto.jpeg');
        $entityManager->persist($article3);

        $entityManager->flush();

        return $this->render('pages/test_article/index.html.twig', [
            'controller_name' => 'TestArticleController',
        ]);
    }
}
