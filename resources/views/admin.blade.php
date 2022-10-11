@extends('layouts.app')

@section('page') Admin Page @endsection
@section('page-button') <a href="{{route('post.create')}}" class="text-md text-white px-8 py-2 bg-green-600 rounded">Add New</a> @endsection

@section('content')
<!-- Posts -->
<div class="w-full h-full flex-col justify-center items-center">
    <!-- Post Card -->
    <div class="flex flex-col">
        <div class="bg-white px-4 py-3 flex items-center flex-col lg:flex-row w-full justify-between border-t border-gray-200 sm:px-6 mt-4 mb-2">
            <div class="w-full lg:w-auto flex flex-row justify-between">
                <div class="flex flex-row space-x-4 justify-center items-center">
                    <a href="{{route('admin').'?month='.((Request::get('month') ?? date('m')) - 1)}}" class="flex items-center px-2 py-2 text-gray-500 border border-gray-400 rounded-md">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6"><path fill="currentColor" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" class=""></path></svg>
                    </a>
                    <p class="font-semibold text-xl">{{\Carbon\Carbon::create()->month(Request::get('month') ?? date('m'))->format('F')}}</p>
                    <a href="{{route('admin').'?month='.((Request::get('month') ?? date('m')) + 1)}}" class="flex items-center px-2 py-2 text-gray-500 border border-gray-400 rounded-md">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-6 h-6"><path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" class=""></path></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class=" font-medium text-indigo-600 truncate">{{$post->title}}</div>
                                            <div class="text-sm text-gray-500">Created By: {{$post->user->name}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 truncate w-40">{{$post->content}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex flex-row"> 
                                        <div class="ml-5 flex flex-row space-x-2 text-gray-400"> 
                                            <a href="{{route('post.edit', $post->id)}}" class="text-md text-white px-8 py-2 bg-green-600 rounded">Edit</a> 
                                            <a class="text-md text-white px-8 py-2 bg-green-600 rounded" href="{{ route('post.status', $post->id) }}">
                                                @if($post->status == 1) Hide @else Unhide @endif
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-start items-center">
            {{$posts->appends(request()->except('page'))->links('partials.pagination')}}
        </div>
    </div>
</div>

@endsection
