@foreach($comments as $comment)
    <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg dark:bg-gray-800">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        {{$comment->created_at->diffForHumans()}}
{{--        <a href="" id="reply"></a>--}}
{{--        <form method="post" action="{{route('comments.store')}}">--}}
{{--            @csrf--}}
{{--            <div class="form-group">--}}
{{--                <input type="text" name="body" class="form-control" />--}}
{{--                <input type="hidden" name="post_id" value="{{ $post_id }}" />--}}
{{--                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <input type="submit" class="btn btn-warning" value="Reply" />--}}
{{--            </div>--}}
{{--        </form>--}}

    </div>
@endforeach

