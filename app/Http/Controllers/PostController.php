<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Support\Carbon;

class PostController extends Controller
{ 
    public function index(){
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return view('posts.posts', compact('posts'));
    }

    public function show($id){
        $posts = Post::WithUser($id);
        return view('posts.post', compact('posts', 'id'));
    }

    public function edit($id, $idp){
        $post = Post::find($idp);
        return view('posts.edit', compact('post', 'id'));
    }

    public function update_post($id, $idp,  Request $request){
        $post = Post::find($idp);

        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ], [
            'title.required' => 'Необходимо ввести заголовок!',
            'title.min' => 'В заголовке должно быть минимум :min символов.',
            'content.required' => 'Необходимо ввести описание поста!',
            'content.min' => 'В описании должно быть минимум :min символов.'
        ]); 

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect('/users/'.$id.'/posts');
    }

    public function delete($id, $idp){
        $post = Post::find($idp);
        $post->delete();
        return redirect('/users/'.$id.'/posts');
    }

    public function create($id){
        return view('posts.create', compact('id'));
    }

    public function store($id, Request $request){    
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ], [
            'title.required' => 'Необходимо ввести заголовок!',
            'title.min' => 'В заголовке должно быть минимум :min символов.',
            'content.required' => 'Необходимо ввести описание поста!',
            'content.min' => 'В описании должно быть минимум :min символов.'
        ]);

        $now = Carbon::now();
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $post->save();

        return redirect('/users/'.$id.'/posts');
    }
}
