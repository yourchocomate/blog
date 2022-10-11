<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Create a new controller instance.
     * 
     * @return void
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    /**
     * Store a newly created comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'comment' => 'required',
            'post_id' => 'required',
        ]);

        $comment = new Comment;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $comment->post_id = $request->post_id;

        $post = Post::find($request->post_id);
        $post->comments()->save($comment);

        return back();

    }

    /**
     * Store a newly created reply.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeReply(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'post_id' => 'required',
            'parent_id' => 'required',
        ]);

        $reply = new Comment;
        $reply->comment = $request->comment;
        $reply->name = auth()->user()->name;
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->parent_id;
        $reply->post_id = $request->post_id;

        $post = Post::find($request->post_id);
        $post->comments()->save($reply);

        return back();

    }

    /**
     * Toggle the comment status.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function toggleStatus($id)
    {
        $comment = Comment::find($id);
        
        if(!$comment->post->isOwner() && !auth()->user()->isAdmin()) return back();

        $comment->status = !$comment->status;
        $comment->save();

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
