<?php

namespace App\Listeners;

use App\Events\ValidateUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ValidateUserListener
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
     * @param  ValidateUser  $event
     * @return void
     */
    public function handle(ValidateUser $event)
    {
        $request = $event->request;
        $request->validate([
            'name' => 'required|min:2',
            'lastname' => 'required',
            'age' => 'required|numeric|min:12|max:99',
            'city' => 'required',
            'email' => 'required|email'
        ], [
            'name.required' => 'Необходимо ввести имя!',
            'name.min' => 'В имени должно быть минимум :min символа.',
            'lastname.required' => 'Необходимо ввести фамилию!',
            'age.required' => 'Необходимо ввести возраст!',
            'age.min' => 'Не обслуживаем клиентов младше :min лет.',
            'age.max' => 'Не обслуживаем клиентов старше :max лет.',
            'age.numeric' => 'Возраст должен быть числом!', 
            'email.required' => 'Необходимо ввести email!',
            'email.email' => 'Это не похоже на email.'
        ]);
    }
}
