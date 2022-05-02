<?php

namespace App\Controller;

use App\Entity\TableStatus;
use App\Form\TableStatusType;
use App\Repository\TableStatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/table/status')]
class TableStatusController extends AbstractController
{
    #[Route('/', name: 'app_table_status_index', methods: ['GET'])]
    public function index(TableStatusRepository $tableStatusRepository): Response
    {
        return $this->render('table_status/index.html.twig', [
            'table_statuses' => $tableStatusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_table_status_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TableStatusRepository $tableStatusRepository): Response
    {
        $tableStatus = new TableStatus();
        $form = $this->createForm(TableStatusType::class, $tableStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tableStatusRepository->add($tableStatus);
            return $this->redirectToRoute('app_table_status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('table_status/new.html.twig', [
            'table_status' => $tableStatus,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_table_status_show', methods: ['GET'])]
    public function show(TableStatus $tableStatus): Response
    {
        return $this->render('table_status/show.html.twig', [
            'table_status' => $tableStatus,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_table_status_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TableStatus $tableStatus, TableStatusRepository $tableStatusRepository): Response
    {
        $form = $this->createForm(TableStatusType::class, $tableStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tableStatusRepository->add($tableStatus);
            return $this->redirectToRoute('app_table_status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('table_status/edit.html.twig', [
            'table_status' => $tableStatus,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_table_status_delete', methods: ['POST'])]
    public function delete(Request $request, TableStatus $tableStatus, TableStatusRepository $tableStatusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tableStatus->getId(), $request->request->get('_token'))) {
            $tableStatusRepository->remove($tableStatus);
        }

        return $this->redirectToRoute('app_table_status_index', [], Response::HTTP_SEE_OTHER);
    }
}
