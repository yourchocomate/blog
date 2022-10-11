@extends('layouts.app')

@section('page') Post Details @endsection
@section('page-button') 
    <a href="{{route('post.edit', $post->id)}}" class="text-md text-white px-8 py-2 bg-green-600 rounded">Edit</a> 
@endsection

@section('content')
<!-- Posts -->
<div class="w-full h-full flex-col justify-center items-center">
    <!-- Post Card -->
    <div class="w-full card flex flex-col pl-8 pr-28 py-8 mb-6">
        <h1 class="text-2xl font-semibold text-black mb-2">{{$post->title}}</h1>
        <p class="text-md">{{$post->content}}</p>
    </div>

    <!-- Comment form -->
    <div class="w-full card flex flex-col justify-center p-8 mb-8">
        <h1 class="text-2xl font-semibold mb-6">Add a comment</h1>
        <form method="POST" action="{{route('comment.store')}}">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="text" name="name" class="w-full  bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('name') focus:outline focus:outline-red-500 @enderror" placeholder="Name"/>
            <textarea rows="4" name="comment" class="w-full  bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('comment') focus:outline focus:outline-red-500 @enderror" placeholder="Comment"></textarea>
            <button class="text-md text-white px-8 py-2 bg-green-600 rounded">Submit comment</button>
        </form>
    </div>

    <!-- Nested Comments -->

    <div class="w-full flex flex-col justify-center">
        <h1 class="text-2xl font-semibold mb-6">Comments:</h1>
        @include('posts.includes.comments', ['comments' => $post->comments, 'child' => false, 'level' => 0])
    </div>
</div>

@endsection