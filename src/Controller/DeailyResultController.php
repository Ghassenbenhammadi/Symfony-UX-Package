<?php

namespace App\Controller;

use App\Entity\DeailyResult;
use App\Form\DeailyResultType;
use App\Repository\DeailyResultRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/deaily/result')]
class DeailyResultController extends AbstractController
{
    #[Route('/', name: 'app_deaily_result_index', methods: ['GET'])]
    public function index(DeailyResultRepository $deailyResultRepository): Response
    {
        return $this->render('deaily_result/index.html.twig', [
            'deaily_results' => $deailyResultRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_deaily_result_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $deailyResult = new DeailyResult();
        $form = $this->createForm(DeailyResultType::class, $deailyResult);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($deailyResult);
            $entityManager->flush();

            return $this->redirectToRoute('app_deaily_result_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('deaily_result/new.html.twig', [
            'deaily_result' => $deailyResult,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_deaily_result_show', methods: ['GET'])]
    public function show(DeailyResult $deailyResult): Response
    {
        return $this->render('deaily_result/show.html.twig', [
            'deaily_result' => $deailyResult,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_deaily_result_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DeailyResult $deailyResult, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DeailyResultType::class, $deailyResult);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_deaily_result_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('deaily_result/edit.html.twig', [
            'deaily_result' => $deailyResult,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_deaily_result_delete', methods: ['POST'])]
    public function delete(Request $request, DeailyResult $deailyResult, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$deailyResult->getId(), $request->request->get('_token'))) {
            $entityManager->remove($deailyResult);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_deaily_result_index', [], Response::HTTP_SEE_OTHER);
    }
}
