<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function index(){
        
        return view('form');
    }

    public function store(Request $request){

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
        $data = $request->only('name', 'lastname', 'age', 'city', 'email');

        Storage::makeDirectory('test-data');
        Storage::put('test-data/' . uniqid() . '.json', json_encode($data));
        return back()->with('message', 'Форма сохранена!');
    }

}
