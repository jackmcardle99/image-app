<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($post->title) }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="flashmessage alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 py-5 mb-4">
                    <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
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
                <a href="{{ url()->previous() }}"><svg class="h-7"  viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#000000" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path><path fill="#000000" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"></path></g></svg>
                </a>
                <p class="opacity-70 sm:px-6 py-2">
                    <strong>Author: </strong> {{ Auth::user()->name }}
                </p>
                <p class="opacity-70 sm:px-6 py-2">
                    <strong>Created: </strong> {{$post->created_at->diffForHumans()}}
                </p>
                <p class="opacity-70 sm:px-6 py-2">
                    <strong>Updated: </strong> {{$post->updated_at->diffForHumans()}}
                </p>
                <form action="{{route('posts.edit',$post)}}" method="post">
                    @method('get')
                    @csrf
                    <button class="ml-auto mx-6 h-10 px-6 font-semibold rounded-md bg-teal-400 text-white" type="submit">
                        Edit post
                    </button>
                </form>

                <form action="{{route('posts.destroy',$post)}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="h-10 px-6 font-semibold rounded-md bg-red-400 text-white " type="submit" onclick="return confirm('Are you sure you would like to delete this post?')">
                        Delete post
                    </button>
{{--                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you would like to delete this post?')">Delete</button>--}}
                </form>
            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{$post->title}}
                </h2><br>
                <p>£{{ $post->value }}</p>
                <p class="mt-6 whitespace-pre-wrap">{{$post->summary}}</p>
                <div class="mt-3">
                    <img src="{{$post->image_path}}" alt="image url: {{$post->image_path}}">
                </div>
            </div>

                <livewire:comments :model="$post"/>

        </div>
    </div>

</x-app-layout>
