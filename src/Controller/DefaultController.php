<?php

namespace App\Controller;

use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(HttpClientInterface $client): Response
    {
        $response = $client->request(
            'GET',
            'https://user:testtest@195.15.245.117:9200/', 
            [
                'verify_host' => false,
                'verify_peer' => false,
            ]
        );
        
        return $this->render('default/index.html.twig', [ 'es' => $response->getContent() ]);
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
