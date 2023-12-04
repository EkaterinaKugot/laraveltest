<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Events\PostNotPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostPublishedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostPublished  $event
     * @return void
     */
    public function handle($event)
    {
        $post = $event->post;
        if ($event instanceof PostPublished) {
            $post->is_published = true;  
        }elseif ($event instanceof PostNotPublished) {
            $post->is_published = false;
        }
        $post->save();
    }


    
}
