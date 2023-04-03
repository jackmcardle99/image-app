<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trashed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse($posts as $post)
                <div class=" my-6 p-6 bg-white border-b border-gray-200 shadow-sm rounded-md sm:rounded-lg mt-6">
                    <h2 class="font-bold text-2xl">
                        <a href="{{route('trashed.show', $post)}}">{{$post->title}}</a>
                    </h2>
                    <br>
                </div>
            @empty
                <p>Trash empty.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
