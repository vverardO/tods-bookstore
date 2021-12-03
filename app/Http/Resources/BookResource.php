<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'user' => $this->whenLoaded('user'),
            'status' => $this->whenLoaded('status'),
        ];
    }
}
