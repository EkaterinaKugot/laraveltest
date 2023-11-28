<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Http\Resources\UserResource;

class AdminController extends Controller
{
    public function index(){
        
        return UserResource::collection(User::all());
    }

    public function show($id){
        
        return new UserResource(User::find($id));
    }

}