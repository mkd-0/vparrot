<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
  #[Route('/','homeIndex',methods:['GET'])]
  public function index() : Response
  {
	
	return $this->render('home.html.twig');
  }


 


}






