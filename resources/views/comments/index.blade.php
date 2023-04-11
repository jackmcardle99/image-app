<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <form class="" method="post" action="{{ route('comments.store',$post)}}">
                            @method('post')
                            @csrf
                            <div>
                                <textarea class="w-1/2 h-1/3 border-r" placeholder="Type comment here..." name="body"></textarea>
                                <input type="hidden" name="post_id"
                                       value="{{$post->id}}"
                                />

                            </div>
                            <div>
                                <button type="submit" class="ml-auto mx-6 h-10 px-6 font-semibold rounded-full bg-black text-white">
                                    Comment
                                </button>
                            </div>
                        </form>
            @foreach($comments as $comment)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="flex">
                        <p>
                            <strong>{{ $comment->user->name}}  </strong> |
                        </p>

                        <p class="opacity-70 text-sm py-0.5 ">
                            {{$comment->created_at->diffForHumans()}}
                        </p>
                    </div>
                    <p>{{ $comment->body }}</p>
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
