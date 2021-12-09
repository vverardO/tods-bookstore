<?php

namespace App\Repositories\Contracts;

interface BookStatusRepositoryInterface
{
    public function getAll();
    public function getById(int $id);
    public function create(array $bookStatus);
    public function update(object $bookStatus, array $data);
    public function destroy(object $category);
}