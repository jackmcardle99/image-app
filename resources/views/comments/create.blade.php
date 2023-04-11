<div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
    <h4>Add comment</h4>
    <form class="" method="post" action="{{ route('comments.store',$post)}}">
        @method('post')
        @csrf
        <div>
            <textarea class="form-control w-3/4 border-r" name="body"></textarea>
            <input type="hidden" name="post_id"
                   value="{{$post->id}}"
            />

        </div>
        <div>
            <input type="submit" class="ml-auto mx-6 h-10 px-6 font-semibold rounded-md bg-black text-white" value="Add Comment" />
        </div>
    </form>
    {{-- Including the file below displays the comment display view               --}}
    @include('comments.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

    {{--                {{$comments->links()}}--}}

</div>
