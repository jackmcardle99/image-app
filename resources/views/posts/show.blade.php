<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($post->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div
                    class="flashmessage alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 py-5 mb-4">
                    <div
                        class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                <span class="text-green-500">
                <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"></path>
                </svg>
                </span>
                    </div>
                    <div class="alert-content ml-4">
                        <div class="alert-title font-semibold text-lg text-green-800">
                            {{ __('Success') }}
                        </div>
                        <div class="alert-description text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="flex">
                <a href="{{ url()->previous() }}">
                    <svg class="h-7 " viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill="#000000" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path>
                            <path fill="#000000"
                                  d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"></path>
                        </g>
                    </svg>
                </a>
                <p class="opacity-70 sm:px-6 py-1">
                    <strong>Author: </strong> {{ Auth::user()->name }}
                </p>
                <p class="opacity-70 sm:px-6 py-1">
                    <strong>Created: </strong> {{$post->created_at->diffForHumans()}}
                </p>
                <p class="opacity-70 sm:px-6 py-1">
                    <strong>Updated: </strong> {{$post->updated_at->diffForHumans()}}
                </p>


                <form action="{{route('comments.index',$post->id)}}" method="post" class="ml-auto mr-5">
                    @method('get')
                    @csrf
                    <button class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
                            disabled:opacity-25 transition ease-in-out duration-150">Comments
                    </button>
                </form>
                <form action="{{route('posts.edit',$post)}}" method="post" class="mr-5">
                    @method('get')
                    @csrf
                    <button class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
                            disabled:opacity-25 transition ease-in-out duration-150">Edit
                    </button>
                </form>
                <form action="{{route('posts.destroy',$post)}}" method="post" class="">
                    @method('delete')
                    @csrf
                    <button class=" inline-flex items-center px-4 py-2 bg-red-800 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
                            disabled:opacity-25 transition ease-in-out duration-150">Delete
                    </button>
                    {{--                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you would like to delete this post?')">Delete</button>--}}
                </form>
            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="flex">
                    <h2 class="font-bold text-4xl">{{$post->title}}</h2><br>
                    <p class="ml-auto text-3xl  font-semibold text-slate-500">£{{ $post->value.".00" }}</p>
                </div>
                <p class="mt-6 whitespace-pre-wrap">{!! ($post->summary) !!}</p>
                <div class="mt-3">
                    <img src="{{$post->image_path}}" alt="image url: {{$post->image_path}}">
                </div>
                <br>

            </div>
        </div>

                    {{--       ENTER COMMENT SECTION    --}}
        <div class="sm:px-6 lg:px-8"></div>
        <form  method="post" action="{{ route('comments.store',$post)}}">
            @method('post')
            @csrf
            <div class="flex justify-center">
                    <textarea
                        class="min-h-[100px] md:w-1/4 w-3/4 resize-none rounded-[7px] border border-blue-gray-200
                         bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0
                         transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200
                         placeholder-shown:border-t-blue-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none
                          disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50"
                        placeholder="Type comment here... " name="body"></textarea>

                <input type="hidden" name="post_id"
                       value="{{$post->id}}"/>
            </div>
            <div class="flex justify-center mt-5">
                <button type="submit" class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                        rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                        active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
                        disabled:opacity-25 transition ease-in-out duration-150">Comment
                </button>
            </div>
        </form>
        </div>

                            {{--    COMMENTS SECTION    --}}
    <div class="py-12">
        @forelse($post->comments->reverse() as $comment) {{-- reverse() because we want comments to display descending--}}
        <!-- component -->
        <div class="flex items-center justify-center dark:bg-gray-800 mb-5">
            <figure class="w-1/2 md:flex bg-slate-200 rounded-xl p-8 md:p-0 dark:bg-slate-800">
                <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                    <blockquote>
                        <p class="text-lg font-medium break-all">
                            "{{$comment->body}}"
                        </p>
                    </blockquote>
                    <figcaption class="font-medium">
                        <div class="text-sky-500 dark:text-sky-400">
                            {{$comment->user->name}}
                        </div>
                        <div class="text-slate-700 dark:text-slate-500">
                            {{$comment->created_at->diffForHumans()}}
                        </div>
                    </figcaption>
                </div>
            </figure>
        </div>
        @empty
            <div class="flex items-center justify-center dark:bg-gray-800 mb-5">
                <p class="mt-5 font-semibold text-xl">No comments yet!</p>
            </div>

        @endforelse
    </div>

{{--        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">--}}
{{--            <form class="" method="post" action="{{ route('comments.store',$post)}}">--}}
{{--                @method('post')--}}
{{--                @csrf--}}
{{--                <div>--}}
{{--                    <textarea class="w-1/2 h-1/3 border-r" placeholder="Type comment here..." name="body"></textarea>--}}
{{--                    <input type="hidden" name="post_id"--}}
{{--                           value="{{$post->id}}"--}}
{{--                    />--}}

{{--                </div>--}}
{{--                <div>--}}
{{--                    <button type="submit" class="ml-auto mx-6 h-10 px-6 font-semibold rounded-md bg-black text-white">--}}
{{--                        Add Comment--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--                    --}}{{-- Including the file below displays the comment display view --}}
{{--            @include('comments.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
