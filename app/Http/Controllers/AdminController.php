<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        
        $files = Storage::files('test-data');
        $data = [];
        foreach ($files as $file){
            $id = basename($file, '.json');
            $data[$id] = json_decode(Storage::get($file));
        }

        //dd($data);
        
        return view('form.admin', ['data' => $data]);
    }

}