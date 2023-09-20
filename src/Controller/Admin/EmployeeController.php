<?php
namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin', name:'admin_')]
class EmployeeController extends AbstractController

{
    #[Route('/employee', name:'employee_index')]
    public function index():Response
    {
        return $this->render('admin/employee/index.html.twig');
    }
    

}



