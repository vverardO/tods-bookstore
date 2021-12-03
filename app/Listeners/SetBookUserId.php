<?php

namespace App\Listeners;

use App\Events\BookCreating;
use Illuminate\Support\Facades\Auth;

class SetBookUserId
{
    public function handle(BookCreating $event)
    {
        $event->book->user_id = Auth::id();
    }
}
