<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12 dark:bg-[conic-gradient(at_bottom_left,_var(--tw-gradient-stops))] from-slate-900 via-purple-900 to-slate-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex">
                <a href="{{ route('trashed.index') }}">
                    <svg class="h-7 " viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000">
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
                @if(Auth::user()->id == $post->user_id)
                <form action="{{route('trashed.update',$post)}}" method="post" class="ml-auto mr-5">
                    @method('put')
                    @csrf
                    <button class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
                            disabled:opacity-25 transition ease-in-out duration-150">Restore
                    </button>
                </form>

                <form action="{{route('trashed.destroy',$post)}}" method="post" class="">
                    @method('delete')
                    @csrf
                    <button class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
                            disabled:opacity-25 transition ease-in-out duration-150" onclick="confirm('Post will be' +
                             ' permanently destroyed. Are you sure you would like to perform this action?')">Destroy
                    </button>
                    {{--                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you would like to delete this post?')">Delete</button>--}}
                </form>
                @endif
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 dark:border-gray-700 shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="flex">
                    <h2 class="dark:text-slate-200 font-bold text-4xl">{{$post->title}}</h2><br>
                    <p class="ml-auto text-3xl  font-semibold text-pink-500">£{{ $post->value.".00" }}</p>
                </div>
                <p class="dark:text-slate-400 mt-6 whitespace-pre-wrap">{!! ($post->summary) !!}</p>
                <div class="mt-3">
                    <img src="{{url('storage/uploads/'.$post->image_filename)}}" alt="image url: {{$post->image_filename}}" ">
                </div>
                <br>

            </div>


        </div>
    </div>

</x-app-layout>
