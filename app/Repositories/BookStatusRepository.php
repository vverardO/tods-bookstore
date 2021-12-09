<?php

namespace App\Repositories;

use App\Models\BookStatus;
use App\Repositories\Contracts\BookStatusRepositoryInterface;

class BookStatusRepository implements BookStatusRepositoryInterface
{
    protected BookStatus $entity;

    public function __construct(BookStatus $bookStatus)
    {
        $this->entity = $bookStatus;
    }

    public function getAll()
    {
        return $this->entity->paginate();
    }

    public function getById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    public function create(array $bookStatus)
    {
        return $this->entity->create($bookStatus);
    }

    public function update(object $book, array $data)
    {
        return $book->update($data);
    }

    public function destroy(object $bookStatus)
    {
        return $bookStatus->delete();
    }
}