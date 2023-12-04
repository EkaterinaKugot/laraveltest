<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\PostPublished' => [
            'App\Listeners\PostPublishedListener',
        ],
        'App\Events\PostNotPublished' => [
            'App\Listeners\PostPublishedListener',
        ],
        'App\Events\ValidateUser' => [
            'App\Listeners\ValidateUserListener',
        ],
        'App\Events\ValidatePost' => [
            'App\Listeners\ValidatePostListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
