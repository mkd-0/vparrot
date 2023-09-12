<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OccasionsController extends AbstractController
{
    #[Route ('/occasions', name : 'occasionCars')]
    public function indexoccasions() : Response
    {
      
      return $this->render('occasions.html.twig');
    }
}
