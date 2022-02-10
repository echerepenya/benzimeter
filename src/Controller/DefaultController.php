<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints as Assert;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'title' => 'Страница',
            'message' => 'Главная страница',
        ]);
    }

    #[Route('/dash', name: 'dashboard')]
    public function dash(Request $request, ManagerRegistry $doctrine): Response
    {
        $task = new Task();
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->renderForm('default/index.html.twig', [
            'title' => 'Страница',
            'form' => $form
        ]);
    }

    #[Route('/task_success', name: 'task_success')]
    public function task_success(): Response
    {
        return $this->render('default/index.html.twig', [
            'title' => 'Успех',
            'message' => 'Форма отправлена успешно'            
        ]);
    }
}
