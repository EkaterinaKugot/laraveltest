<?php

namespace App\Listeners;

use App\Events\ValidatePost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ValidatePostListener
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
     * @param  ValidatePost  $event
     * @return void
     */
    public function handle(ValidatePost $event)
    {
        $request = $event->request;
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ], [
            'title.required' => 'Необходимо ввести заголовок!',
            'title.min' => 'В заголовке должно быть минимум :min символов.',
            'content.required' => 'Необходимо ввести описание поста!',
            'content.min' => 'В описании должно быть минимум :min символов.'
        ]);
    }
}
