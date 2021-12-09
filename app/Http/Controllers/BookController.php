<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $show = $request->get('show', 5);

        $books = Book::with('user', 'status')->where(function (Builder $builder) use ($request) {
            if ($createdAt = $request->get('created_at')) {
                $builder->where('created_at', '>=', $createdAt);
            }

            if ($updatedAt = $request->get('updated_at')) {
                $builder->where('updated_at', '>=', $updatedAt);
            }

            if ($title = $request->get('title')) {
                $builder->where('title', 'like', "%{$title}%");
            }

            if ($description = $request->get('description')) {
                $builder->where('description', 'like', "%{$description}%");
            }
        })->paginate($show);

        return new BookCollection($books);
    }

    public function store(StoreBookRequest $request)
    {
        $book = new Book();

        $fields = $request->only($book->getFillable());

        $book->fill($fields)->save();

        return new BookResource($book);
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $fields = $request->only($book->getFillable());

        $book->fill($fields)->save();

        return new BookResource($book);
    }

    public function destroy(Book $book)
    {
        try {
            $book->delete($book->id);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao excluir o agendamento'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json([
            'success' => true
        ], Response::HTTP_NO_CONTENT);
    }
}
