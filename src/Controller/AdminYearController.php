<?php

namespace App\Controller;

use App\Entity\Year;
use App\Form\YearType;
use App\Repository\YearRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/year')]
class AdminYearController extends AbstractController
{
    #[Route('/', name: 'app_admin_year_index', methods: ['GET'])]
    public function index(YearRepository $yearRepository): Response
    {
        return $this->render('admin_year/index.html.twig', [
            'years' => $yearRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_year_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $year = new Year();
        $form = $this->createForm(YearType::class, $year);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($year);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_year_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_year/new.html.twig', [
            'year' => $year,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_year_show', methods: ['GET'])]
    public function show(Year $year): Response
    {
        return $this->render('admin_year/show.html.twig', [
            'year' => $year,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_year_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Year $year, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(YearType::class, $year);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_year_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_year/edit.html.twig', [
            'year' => $year,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_year_delete', methods: ['POST'])]
    public function delete(Request $request, Year $year, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$year->getId(), $request->request->get('_token'))) {
            $entityManager->remove($year);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_year_index', [], Response::HTTP_SEE_OTHER);
    }
}
