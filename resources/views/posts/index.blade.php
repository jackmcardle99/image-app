<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse($posts as $post)
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-2xl">
                    {{ $post->title }}
                </h2>
                <p>
                    <span> <img src="{{$post->image_path}}" width="160"> </span>
                    {{ Str::limit($post->summary, 50) }}
                </p>
            </div>
            @empty
                <p>You have no posts.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
