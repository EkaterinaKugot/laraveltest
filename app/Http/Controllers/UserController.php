<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Comment;
use Illuminate\Support\Carbon;

class UserController extends Controller
{ 
    public function index(){
        $users = User::all();
        return view('users.users', compact('users'));
    }

    public function show($id){
        $user = User::withRoles($id);
        $comments = Comment::where('commentable_type', 'App\Models\User')
        ->where('commentable_id', $id)
        ->get();
        return view('users.user', compact('user', 'comments'));
    }

    public function edit($id){
        $user = User::withRoles($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update_user($id, Request $request){
        $user = User::withRoles($id);
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
        DB::transaction(function () use ($user, $request) {
            $user->update([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'age' => $request->input('age'),
                'city' => $request->input('city'),
                'email' => $request->input('email'),
            ]);

            $roles = $request->input('roles');
            $user->roles()->sync($roles); // Обновляем роли пользователя
        });

        return redirect('/users/'.$id);
    }

    public function delete($id){
        $user = User::find($id);
        $user->posts()->delete();
        $user->delete();
        return redirect('users');
    }

    public function create(){
        $roles = Role::all();
        return view('users.create', compact('roles'));
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

        $now = Carbon::now();

        $user = new User([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'age' => $request->input('age'),
            'city' => $request->input('city'),
            'email' => $request->input('email'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        if (!empty($request->input('roles'))){
            DB::transaction(function () use ($user, $request) {
                $user->save();
    
                $roles = $request->input('roles');
                $user->roles()->attach($roles); // Привязываем роли к пользователю
            });
        }else{
            $user->save();
        }

        return redirect('users');
    }
}
