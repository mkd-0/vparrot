<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\Car1Type;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/occasions/detail')]
class DetailOccasionController extends AbstractController
{
    #[Route('/', name: 'app_detail_occasion_index', methods: ['GET'])]
    public function index(CarRepository $carRepository): Response
    {
        return $this->render('detail_occasion/index.html.twig', [
            'cars' => $carRepository->findAll(),
        ]);
    }

    

    #[Route('/{id}', name: 'app_detail_occasion_show', methods: ['GET'])]
    public function show(Car $car): Response
    {
        return $this->render('detail_occasion/show.html.twig', [
            'car' => $car,
        ]);
    }

    
}
