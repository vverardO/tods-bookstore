<?php

namespace App\Providers;

use App\Events\BookCreating;
use App\Listeners\SetBookStatusDefaultId;
use App\Listeners\SetBookUserId;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        BookCreating::class => [
            SetBookUserId::class,
            SetBookStatusDefaultId::class,
        ]
    ];

    public function boot() {}
}
