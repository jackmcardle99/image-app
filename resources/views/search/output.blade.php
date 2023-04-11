<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Search') }}--}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{url('/search')}}" method="GET" class="space-y-2 mb-6">
                            <input
                                id="query"
                                name="query"
                                type="search"
                                placeholder="Search posts..."
                                class="block w-full"
                                value="{{request()->get('query')}}">
                            <button class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
                            disabled:opacity-25 transition ease-in-out duration-150">Search</button>
                        </form>

                        @if($results)
                        {{$results->links()}}
                        @endif
                        @forelse ($results as $result)
                        <a href="{{route('posts.show',$result)}}">
                            <div class="dark:bg-slate-800 my-6 p-6 bg-white border-b border-gray-200 shadow-sm rounded-md sm:rounded-lg">
                                <h2 class="dark:text-white font-bold text-2xl">
                                    {{Str::limit($result->title,30)}}
                                </h2>
                                <p class="dark:text-slate-400  pt-4 italic text-gray-500">
                                    Categories:
                                    @forelse($result->categories as $category)
                                        {{$category->topic}}@if (!$loop->last),@endif
                                    @empty
                                        <span>No categories defined for this note.</span>
                                    @endforelse
                                </p>
                                <br>
                                <span> <img src="{{$result->image_path}}" width="160" > </span><br>
                                <p class="dark:text-white line-clamp-1">
                                    {{--                    {{Str::limit($post->summary, 40)}}--}}
                                    {!! html_entity_decode(Str::limit($result->summary, 40)) !!}
                                </p>
                                <br>
                                <div class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <path d="M18,2H6C4.895,2,4,2.895,4,4v16c0,1.105,0.895,2,2,2h12c1.105,0,2-0.895,2-2V4C20,2.895,19.105,2,18,2z M12,6 c1.7,0,3,1.3,3,3s-1.3,3-3,3s-3-1.3-3-3S10.3,6,12,6z M16.333,18H7.667C7.298,18,7,17.702,7,17.333V17c0-1.571,2.512-3,5-3 s5,1.429,5,3v0.333C17,17.702,16.702,18,16.333,18z"></path>
                                    </svg>
                                    <strong>{{ $result->user->name}}</strong>
                                </div><br>
                                <span class="block  text-sm opacity-70">Updated: {{$result->updated_at->diffForHumans()}}</span>
                            </div>
                        </a>

                        @empty
                            No results.
                        @endforelse
                        @if($results)
                        {{$results->links()}}
                        @endif
                    </div>
            </div>
    </div>


</x-app-layout>
