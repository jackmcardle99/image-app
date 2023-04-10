<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($comments as $comment)
            <div class="dark:bg-slate-800 my-6 p-6 bg-white border-b border-gray-200 shadow-sm rounded-md sm:rounded-lg">
                <strong>{{$comment->user->name}}</strong>
                <p class="dark:text-slate-400  pt-4 italic text-gray-500">
                    {{$comment->body}}
                </p>
                <br>
                {{$comment->created_at->diffForHumans()}}
                <div class="flex space-x-2">
                </div><br>
            </div>
            @endforeach
                {{$comments->links()}}
                <div class="grid md:grid-cols-3 grid-cols-1 gap-4">
                    <div>

                    </div>

            </div>
                <br>

        </div>
    </div>
</x-app-layout>
