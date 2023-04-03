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
                    Restore Post
                </button>
                <form action="{{route('trashed.destroy',$post)}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="h-10 px-6 font-semibold rounded-md bg-red-400 text-white " type="submit" onclick="return confirm('Are you sure you would like to permanently delete this post? ' +
                     'You will not be able to recover it.')">
                        Permanently Delete
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
                    <img src="{{$post->image_path}}" alt="image url: {{$post->image_ppath}}">
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
