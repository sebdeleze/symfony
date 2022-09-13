<?php

namespace App\Components;

use App\Repository\TodoRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('todo_search')]
class TodoSearchComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $query = null;

    public function __construct(private TodoRepository $todoRepository)
    {
    }

    public function getTodos(): array
    {
        $todos = $this->todoRepository->findAll();

        if (!empty($this->query)) {
            $todos = array_filter($todos, function ($item) {
                return stripos($item->getTitle(), $this->query) !== false;
            });
        }

        return $todos;
    }
}
