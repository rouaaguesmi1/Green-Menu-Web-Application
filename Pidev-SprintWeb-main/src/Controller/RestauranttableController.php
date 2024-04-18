<?php

namespace App\Controller;

use App\Entity\Restauranttable;
use App\Form\RestauranttableType;
use App\Repository\RestauranttableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/restauranttable')]
class RestauranttableController extends AbstractController
{
    #[Route('/', name: 'app_restauranttable_index', methods: ['GET'])]
    public function index(RestauranttableRepository $restauranttableRepository): Response
    {
        return $this->render('restauranttable/index.html.twig', [
            'restauranttables' => $restauranttableRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_restauranttable_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $restauranttable = new Restauranttable();
        $form = $this->createForm(RestauranttableType::class, $restauranttable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($restauranttable);
            $entityManager->flush();

            return $this->redirectToRoute('app_restauranttable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restauranttable/new.html.twig', [
            'restauranttable' => $restauranttable,
            'form' => $form,
        ]);
    }

    #[Route('/{tableid}', name: 'app_restauranttable_show', methods: ['GET'])]
    public function show(Restauranttable $restauranttable): Response
    {
        return $this->render('restauranttable/show.html.twig', [
            'restauranttable' => $restauranttable,
        ]);
    }

    #[Route('/{tableid}/edit', name: 'app_restauranttable_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Restauranttable $restauranttable, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RestauranttableType::class, $restauranttable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_restauranttable_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restauranttable/edit.html.twig', [
            'restauranttable' => $restauranttable,
            'form' => $form,
        ]);
    }

    #[Route('/{tableid}', name: 'app_restauranttable_delete', methods: ['POST'])]
    public function delete(Request $request, Restauranttable $restauranttable, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restauranttable->getTableid(), $request->request->get('_token'))) {
            $entityManager->remove($restauranttable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_restauranttable_index', [], Response::HTTP_SEE_OTHER);
    }
}
