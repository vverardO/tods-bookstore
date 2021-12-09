<?php

namespace App\Services;

use App\Repositories\BookStatusRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BookStatusService
{
    protected BookStatusRepository $repository;

    public function __construct(BookStatusRepository $bookStatusRepository)
    {
        $this->repository = $bookStatusRepository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById(int $id)
    {

        $bookStatus = $this->repository->getById($id);

        if (!$bookStatus) {
            throw new HttpException(404, 'BookStatus not found');
        }

        return $bookStatus;
    }

    public function create(array $bookStatus)
    {
        return $this->repository->create($bookStatus);
    }

    public function update(int $id, array $data)
    {
        $bookStatus = $this->repository->getById($id);

        if (!$bookStatus) {
            throw new HttpException(404, 'Book Status not found');
        }

        $this->repository->update($bookStatus, $data);

        return $bookStatus;
    }

    public function destroy(int $id)
    {
        $bookStatus = $this->repository->getById($id);

        if (!$bookStatus) {
            throw new HttpException(404, 'Book Status not found');
        }

        $this->repository->destroy($bookStatus);

        return response()
            ->noContent(204);
    }
}