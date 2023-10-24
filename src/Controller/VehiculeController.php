<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehiculeController extends AbstractController
{
    #[Route('/vehicules', name: 'app_vehicules', methods: 'GET')]
    public function index(VehiculeRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $vehicules = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), 10
        );

        return $this->render('pages/vehicule/index.html.twig', [
            'vehicules' => $vehicules
        ]);
    }

    #[Route('/vehicules/nouveau', name: 'vehicules.new', methods: ['GET', 'POST'])]
    public function new(): Response {
        $vehicule = new Vehicule();
        $form = $this->createForm(VehiculeType::class, $vehicule);

        return $this->render('pages/vehicule/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
