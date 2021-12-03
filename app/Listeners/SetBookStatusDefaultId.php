<?php

namespace App\Listeners;

use App\Events\BookCreating;
use App\Models\BookStatus;

class SetBookStatusDefaultId
{
    private BookStatus $bookStatus;

    public function __construct(BookStatus $bookStatus)
    {
        $this->bookStatus = $bookStatus;
    }

    public function handle(BookCreating $event)
    {
        $event->book->status_id = $this->bookStatus->inRandomOrder()->first()->id;
    }
}
