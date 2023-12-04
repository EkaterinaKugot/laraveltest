<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{ 
    public function index($id, $idp){
        $comments = Comment::where('commentable_type', 'App\Models\Post')
        ->where('commentable_id', $idp)->where('approved', true)
        ->get();
        $post = Post::with('user')->find($idp);
        return view('comments.post_com', compact('comments', 'post'));
    }

    public function delete($id, $idp, $idc){
        $com = Comment::find($idc);
        $com->delete();
        if ($idp == 0){
            return redirect('/users/'.$id);
        }
        return redirect('/users/'.$id.'/post/'.$idp);
    }

    public function create($id, $idp){
        return view('comments.create', compact('id', 'idp'));
    }

    public function store($id, $idp, Request $request){
        $request->validate([
            'content' => 'required|min:10'
        ], [
            'content.required' => 'Необходимо ввести описание комментария!',
            'content.min' => 'В комментария должно быть минимум :min символов.'
        ]);
        $now = Carbon::now();

        if ($idp == 0){
            $comm = new Comment([
                'commentable_type' => 'App\Models\User',
                'commentable_id' => $id,
                'content' => $request->input('content'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $comm->save();
            return redirect('/users/'.$id);
        }else{                   
            $comm = new Comment([
                'commentable_type' => 'App\Models\Post',
                'commentable_id' => $idp,
                'content' => $request->input('content'),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            $comm->save();

            return redirect('/users/'.$id.'/post/'.$idp);
        }
    }

    public function moderation(){
        $comments = Comment::where('approved', false)->get();
        return view('comments.moderation', compact('comments'));
    }

    public function approve($id){
        $comment = Comment::find($id);
        $comment->approved = true;
        $comment->save();
        return redirect('/comments');
    }
}
