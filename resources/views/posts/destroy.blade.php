<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="dark:bg-gray-900 flex-auto flex space-x-4 justify-center">
            <button class="h-10 px-6 font-semibold rounded-md bg-teal-400 text-white" type="submit">
                +
                Create post
            </button>
            <a href="{{route('categories.index')}}">
                <button class="h-10 px-6 font-semibold rounded-md border bg-teal-600 border-slate-200 text-white" type="button">
                    Categories
                </button></a>
            <button class="h-10 px-6 font-semibold rounded-md border bg-teal-600 border-slate-200 text-white" type="button">
                Search
            </button>

        </div>
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{--            @if(request()->routeIs('notes.index'))--}}
            {{$posts->links()}}
            @forelse($posts as $post)
                <a href="{{route('posts.show',$post)}}">
                    <div class=" my-6 p-6 bg-white border-b border-gray-200 shadow-sm rounded-md sm:rounded-lg">
                        <h2 class="font-bold text-2xl">
                            {{ $post->title }}
                        </h2>
                        <p class="pt-4 italic text-gray-500">
                            Categories:
                            @forelse($post->categories as $category)
                                {{$category->topic}}@if (!$loop->last),@endif
                            @empty
                                <span>No categories defined for this note.</span>
                            @endforelse
                        </p>
                        <br>
                        <p>
                            <span> <img src="{{$post->image_path}}" width="160" > </span><br>
                            {{ Str::limit($post->summary, 50) }}
                        </p><br>
                        <div class="flex space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 24 24">
                                <path d="M18,2H6C4.895,2,4,2.895,4,4v16c0,1.105,0.895,2,2,2h12c1.105,0,2-0.895,2-2V4C20,2.895,19.105,2,18,2z M12,6 c1.7,0,3,1.3,3,3s-1.3,3-3,3s-3-1.3-3-3S10.3,6,12,6z M16.333,18H7.667C7.298,18,7,17.702,7,17.333V17c0-1.571,2.512-3,5-3 s5,1.429,5,3v0.333C17,17.702,16.702,18,16.333,18z"></path>
                            </svg>
                            <strong>{{ Auth::user()->name }}</strong>
                        </div><br>
                        <div class="inline-flex space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 24 24">
                                <path d="M 4 2 L 4 22 L 12 19 L 20 22 L 20 2 L 6 2 L 4 2 z"></path>
                            </svg>
                            {{$post->likes}}
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="24" height="24"
                                 viewBox="0 0 24 24">
                                <path d="M 12 2 A 9 9 0 0 0 3 11 A 9 9 0 0 0 12 20 L 12 23 C 12 23 19.39165 19.370314 20.761719 13.015625 A 9 9 0 0 0 20.839844 12.65625 C 20.880821 12.423525 20.923277 12.190914 20.947266 11.951172 A 9 9 0 0 0 20.957031 11.863281 C 20.982749 11.579721 21 11.293169 21 11 A 9 9 0 0 0 12 2 z"></path>
                            </svg>
                            {{$post->comments}}
                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 12c0-2.25 3.75-7.5 10.5-7.5S22.5 9.75 22.5 12s-3.75 7.5-10.5 7.5S1.5 14.25 1.5 12zM12 16.75a4.75 4.75 0 1 0 0-9.5 4.75 4.75 0 0 0 0 9.5zM14.7 12a2.7 2.7 0 1 1-5.4 0 2.7 2.7 0 0 1 5.4 0z" fill="#000000"/></svg>
                            {{$post->views}}
                        </div>
                        <span class="block mt-4 text-sm opacity-70">{{$post->updated_at->diffForHumans()}}</span>
                    </div>
                </a>
            @empty
                <p>You have no posts.</p>
            @endforelse
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>
