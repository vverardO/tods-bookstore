<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookStatusRequest;
use App\Http\Requests\UpdateBookStatusRequest;
use App\Http\Resources\BookStatusResource;
use App\Services\BookStatusService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class BookStatusController extends Controller
{
    protected BookStatusService $service;

    public function __construct(BookStatusService $bookStatusService)
    {
        $this->service = $bookStatusService;
    }

    public function index(): JsonResource
    {
        return BookStatusResource::collection(
            $this->service->getAll()
        );
    }

    public function store(StoreBookStatusRequest $request): JsonResource
    {
        $bookStatus = $this->service->create(
            $request->only([
                'title',
            ])
        );

        return new BookStatusResource($bookStatus);
    }

    public function show(int $id): JsonResource
    {
        return new BookStatusResource($this->service->getById($id));
    }

    public function update(UpdateBookStatusRequest $request, int $id): JsonResource
    {
        $bookStatus = $this->service->update($id,
            $request->only([
                'title',
            ])
        );

        return new BookStatusResource($bookStatus);
    }

    public function destroy(int $id): Response
    {
        return $this->service->destroy($id);
    }
}
