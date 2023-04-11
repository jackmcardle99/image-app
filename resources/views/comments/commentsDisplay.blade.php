@foreach($comments as $comment)
    <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg dark:bg-gray-800">
        <div class="flex">
            <p>
                <strong>{{ $comment->user->name}}  </strong> |
            </p>

            <p class="opacity-70 text-sm py-0.5 ">
            {{$comment->created_at->diffForHumans()}}
            </p>
        </div>


        <p>{{ $comment->body }}</p>

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

