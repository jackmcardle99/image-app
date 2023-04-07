<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="pb-8">
            @if ($errors->any())
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Something went Wrong...
                    </div>
                    <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="pb-8">
            @if(session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{route('posts.update', $post)}}" method="post">
                    @method('patch')
                    @csrf
                    <input
                        type="text"
                        name="title"
                        field="title"
                        class="w-full"
                        autocomplete="off"
                        value="{{$post->title}}">
                    <textarea
                        id="summary"
                        name="summary"
                        rows="10"
                        field="text"
                        class="w-full mt-6">{{$post->summary}}</textarea>


                    <input
                        type="text"
                        field="image_path"
                        name="image_path"
{{--                        placeholder="Enter image URL"--}}
                        autocomplete="off"
                        value="{{$post->image_path}}">
                    <input
                        type="number"
                        name="value"
                        field="value"
                        value="{{$post->value}}">
                    <br><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
