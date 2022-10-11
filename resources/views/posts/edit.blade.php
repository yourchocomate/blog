@extends('layouts.app')

@section('page') Edit Post Page @endsection

@section('content')
<div class="flex w-full h-full justify-center items-center">
    <div class="card flex flex-col justify-center items-center p-12 w-full md:w-[50%]">
        <div class="text-2xl font-semibold mb-4">{{ __('Edit Post') }}</div>
        <form class="w-full flex flex-col" method="POST" action="{{ route('post.update') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="flex flex-col">
                <p class="text-sm mb-4">{{ __('Post Title') }}</p>
                <input id="title" type="text" 
                class="w-full bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('title') focus:outline focus:outline-red-500 @enderror" name="title" value="{{$post->title}}" placeholder="title" required>
        
                @error('title')
                    <span class="text-red-500 mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="flex flex-col">
                <p class="text-sm mb-4">{{ __('Password') }}</p>
                <textarea rows="4" name="content" class="w-full  bg-gray-200 text-gray-800 focus:outline-none py-2 px-4 border shadow-inner rounded mb-6 @error('content') focus:outline focus:outline-red-500 @enderror" placeholder="write here...">{{$post->content}}</textarea>
            
                @error('content')
                    <span class="text-red-500 mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="text-md text-white px-8 py-2 bg-green-600 rounded">Update</button>
        </form>
    </div>
</div>

@endsection
