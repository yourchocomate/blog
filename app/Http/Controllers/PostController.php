<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class PostController extends Controller
{

    /**
     * Create new controller instance.
     * 
     * @return void
     */

    public function _construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user()->associate($request->user());
        $post->slug = Str::slug($request->title) . '-' . Str::random(10);
        $post->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                    ->first();
        return view('posts.details', compact('post'));
    }

    /**
     * Toggle the post status.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function toggleStatus($id)
    {
        $post = Post::find($id);

        if(!$post->isOwner() || !auth()->user()->isAdmin()) return back();

        $post->status = !$post->status;
        $post->save();

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
        $post = Post::find($id);

        if(!$post->isOwner() || !auth()->user()->isAdmin()) return back();

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($request->post_id);
        
        if(!$post->isOwner() || !auth()->user()->isAdmin()) return back();
        
        $post->update($request->except('post_id', '_token'));

        return redirect()->route('post.show', $post->slug);
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
