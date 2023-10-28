<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // $users = [
        //     'alex' => 'Alex',
        //     'kate' => 'Kate'
        // ];

        $users = [
            (object)[
                'id' => 'alex',
                'name' => 'Alex'
            ],
            (object)[
                'id' => 'kate',
                'name' => 'Kate'
            ],
            (object)[
                'id' => 'harry',
                'name' => 'Harry'
            ],
            (object)[
                'id' => 'lola',
                'name' => 'Lola'
            ],
            (object)[
                'id' => 'margarita',
                'name' => 'Margarita'
            ]
        ];

        $title = 'All users';
        return view('users.users', ['title' => $title, 'users' => $users]);
    }

    public function show($name){
        $title = 'User Info';
        return view('users.user', ['title' => $title,'name' => $name]);
    }
}
