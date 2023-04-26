<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            @if ($errors->any())
                <x-alert>Something went Wrong...</x-alert>
            @endif
            @if (session('success'))
                <x-success-alert></x-success-alert>
            @endif
            <div class="flex">
                <a href="{{ route('posts.index') }}">
                    <svg class="h-7 mt-0.5" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill="#008989" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path>
                            <path fill="#008989"
                                  d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"></path>
                        </g>
                    </svg>
                </a>
                <p class="dark:text-slate-200 opacity-70 sm:px-6 py-1">
                    <strong>Author: </strong> {{ $post->user->name }}
                </p>
                <p class="dark:text-slate-200 opacity-70 sm:px-6 py-1">
                    <strong>Created: </strong> {{$post->created_at->diffForHumans()}}
                </p>
                <p class="dark:text-slate-200 opacity-70 sm:px-6 py-1">
                    <strong>Updated: </strong> {{$post->updated_at->diffForHumans()}}
                </p>

                @can('is_post_owner', $post)
                <form action="{{route('posts.edit',$post)}}" method="post" class=" ml-auto mr-5">
                    @method('get')
                    @csrf
                    <x-primary-button>Edit</x-primary-button>
                </form>
                <form action="{{route('posts.destroy',$post)}}" method="post" class="">
                    @method('delete')
                    @csrf
                    <x-danger-button onclick="return confirm('Post will be moved' +
                             ' to trash, are you sure you would like to perform this action?')">Delete
                    </x-danger-button>
                </form>
                @endcan

            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 dark:border-gray-700 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="flex">
                    <h2 class="dark:text-slate-200 font-bold text-4xl">{{$post->title}}</h2><br>
                    <p class="ml-auto text-3xl  font-semibold text-pink-500">£{{ $post->value.".00" }}</p>
                </div>
                <p class="dark:text-slate-400 mt-6 whitespace-pre-wrap">{!! ($post->summary) !!}</p>
                <div class="mt-3">
                    <img src="{{url('storage/uploads/'.$post->image_filename)}}" alt="File name: {{$post->image_filename}}">
                </div>

            </div>
        </div>

                    {{--       ENTER COMMENT SECTION    --}}
        <form  method="post" action="{{ route('comments.store')}}">
            @method('post')
            @csrf
            <div class="flex justify-center">
                    <textarea
                        class=" dark:bg-gray-800 dark:text-slate-200 min-h-[100px] md:w-1/4 w-3/4 resize-none rounded-[7px] border border-blue-gray-200
                         bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0
                         transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200
                         placeholder-shown:border-t-blue-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none
                          disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50"
                        placeholder="Type comment here... " name="body"></textarea>

                <input type="hidden" name="post_id"
                       value="{{$post->id}}"/>
            </div>
            <div class="flex justify-center mt-5">
                <x-primary-button>Comment
                </x-primary-button>
            </div>
        </form>

        <div class="flex justify-center items-center mt-10 mb-6">

        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion ({{$comments->total()}})</h2>
        </div>
        @forelse($comments as $comment)
        <section class=" py-8 lg:py-5">

            <div class="max-w-2xl mx-auto px-4">
                <article class="p-6 mb-6 text-base bg-white rounded-lg bg-slate-300 dark:bg-[#141a1c]">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">{{$comment->user->name}}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{$comment->created_at->diffForHumans()}}</p>
                        </div>
                    </footer>
                    <p class="text-gray-700 dark:text-gray-400 break-all">{{$comment->body}}</p>
                    @can('is_admin')
                    <form action="{{route('comments.destroy',$comment)}}" method="post">
                        @method('delete')
                        @csrf
                        <x-danger-button class="mt-5" onclick="return confirm('Comment will be permanently deleted,' +
                                     ' are you sure you would like to perform this action?')">Delete
                        </x-danger-button>
                    </form>
                    @endcan
                </article>
            </div>
            @empty
                <div class="flex items-center justify-center mb-5">
                    <p class="mt-5 font-semibold dark:text-slate-200 text-xl">No comments yet!</p>
                </div>
            @endforelse
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                {{$comments->links()}}
            </div>
        </section>
        </div>
</x-app-layout>
