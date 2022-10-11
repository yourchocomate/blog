<div class="w-full flex flex-col mb-4">
    @foreach($comments as $key => $comment)
    <div class="flex flex-row justify-between px-6 py-3 border border-gray-300 mb-4" style="margin-left: @if($child) {{($key + 1) * (2 * $level)}}rem @endif;">
        <div class="flex flex-col">
            <h1 class="text-base font-semibold">{{$comment->name}}</h1>
            <p class="text-sm">{{$comment->created_at}}</p>
            <p class="text-base">{{$comment->comment}}</p>
        </div>
        <form method="POST" action="{{route('reply.store')}}" class="flex flex-row justify-center items-center">
            @csrf
            <input type="hidden" name="post_id" value="{{$comment->post_id}}">
            <input type="hidden" name="parent_id" value="{{$comment->id}}">
            <input name="comment" class="w-full bg-gray-200 text-gray-800 py-1 px-4 border rounded-l shadow-inner" type="text">
            <button type="submit" class="text-md text-white px-8 py-2 bg-green-600 rounded -ml-1 h-10">Reply</button>
        </form>
        @if($comment->post->user_id === auth()->user()->id || auth()->user()->isAdmin())
        <div class="flex justify-center items-center">
            <a class="text-md text-white px-8 py-2 bg-green-600 rounded" href="{{ route('comment.status', $comment->id) }}">
                @if($comment->status == 1) Hide @else Unhide @endif
            </a>
        </div>
        @endif
    </div>
    @include('posts.partials.comments', ['comments' => $comment->replies, 'child' => true, 'level' => $level + 1])
    @endforeach
</div>