@extends('layouts.app')

@section('page') All Post Page @endsection
@section('page-button') <a href="{{route('post.create')}}" class="text-md text-white px-8 py-2 bg-green-600 rounded">Add New</a> @endsection
@section('content')
<!-- Posts -->
<div class="w-full h-full flex-col justify-center items-center">
    <!-- Post Card -->
    @forelse($posts as $post)
    <div class="w-full card flex flex-col p-4 px-8 md:pl-8 md:pr-28 py-8 mb-6 overflow-hidden">
        <h1 class="text-2xl font-semibold text-black mb-2">{{$post->title}}</h1>
        <p class="line-clamp-2 text-md">{{$post->content}}</p>
        <div class="w-full flex flex-row justify-between mt-10">
            <p class="text-md text-black">Created By <span class="font-semibold">{{$post->user->name}}</span> {{$post->created_at->diffForHumans()}}</p>
            <a href="{{route('post.show', $post->slug)}}" class="text-md text-gray-700 rounded-md px-8 py-2 bg-gray-200">Read More</a>
        </div>
    </div>
    @empty
    <div class="w-full card flex flex-col pl-8 pr-28 py-8 mb-6">
        <h1 class="text-2xl font-semibold text-black mb-2">No Posts Found</h1>
        <p class="line-clamp-2 text-md">No Posts Found</p>
    </div>
    @endforelse
    <div class="w-full flex justify-end items-center">
        {{$posts->links('partials.pagination')}}
    </div>
</div>

@endsection
