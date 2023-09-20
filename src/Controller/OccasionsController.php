<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\CarRepository;


#[Route ('/occasions')]
class OccasionsController extends AbstractController
{
    #[Route ('/', name : 'occasions_index')]
    public function indexoccasions(CarRepository $carRepository) : Response
    {
      
      return $this->render('occasions.html.twig',[
        'cars' => $carRepository->findAll(),
        
    ]);
    }
}