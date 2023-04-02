<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <p class="opacity-70 sm:px-6 py-2">
                    <strong>Author: </strong> {{ Auth::user()->name }}
                </p>
                <p class="opacity-70 sm:px-6 py-2">
                    <strong>Created: </strong> {{$post->created_at->diffForHumans()}}
                </p>
                <p class="opacity-70 sm:px-6 py-2">
                    <strong>Updated: </strong> {{$post->updated_at->diffForHumans()}}
                </p>
                <button class="ml-auto mx-6 h-10 px-6 font-semibold rounded-md bg-teal-400 text-white" type="submit">
                    Edit Post
                </button>
                <button class="h-10 px-6 font-semibold rounded-md bg-red-400 text-white " type="submit">
                    Delete Post
                </button>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{$post->title}}
                </h2><br>
                <p>£{{ $post->value }}</p>
                <p class="mt-6 whitespace-pre-wrap">{{$post->summary}}</p>
                <div class="mt-3">
                    <img src="{{$post->image_path}}" alt="image url: {{$post->image_ppath}}">
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
