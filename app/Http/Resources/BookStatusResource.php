<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookStatusResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'books' => $this->whenLoaded('books'),
        ];
    }
}
