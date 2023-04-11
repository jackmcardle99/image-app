<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
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
                                class="block w-full">
                            <button class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
                            disabled:opacity-25 transition ease-in-out duration-150">Search</button>
                        </form>
                        @forelse ($results as $result)
                            <div class="text-lg font-semibold">
                                <a href="{{route('posts.show',$result)}}">
                                {{$result->title}}
                                </a>
                            </div>
                        @empty
                            No results.
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
