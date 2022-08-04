<?php

namespace App\Controller;

use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/todos/")
     */
    public function todos(TodoRepository $todoRepository): Response
    {
        return $this->render('default/todos.html.twig', [
            'todos' => $todoRepository->findAll()
        ]);
    }
}
