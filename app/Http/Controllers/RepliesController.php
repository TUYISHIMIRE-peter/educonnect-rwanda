<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Replies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RepliesController extends Controller
{
    public function store(Request $request)
    {
    $comment = new Replies;

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $post = Post::find($request->post_id);

        $post->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Replies();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);
        
        return back();

    }
}
