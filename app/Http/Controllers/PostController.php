<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Support\Carbon;
use App\Events\PostPublished;
use App\Events\PostNotPublished;
use App\Events\ValidatePost;

class PostController extends Controller
{ 
    public function index(){
        $posts = Post::with('user')->where('is_published', 1)->orderBy('created_at', 'desc')->get();
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

        event(new ValidatePost($request));

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        $post->save();

        if ($request->input('is_published') == '1'){
            event(new PostPublished($post));
        }else{
            event(new PostNotPublished($post));
        }

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

        event(new ValidatePost($request));

        $now = Carbon::now();
        
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $post->save();

        if ($request->input('is_published') == '1'){
            event(new PostPublished($post));
        }else{
            event(new PostNotPublished($post));
        }

        return redirect('/users/'.$id.'/posts');
    }
}
