<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="py-12">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">
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
                <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input
                        type="text"
                        name="title"
                        field="title"
                        class="w-full"
                        autocomplete="off"
                        value="{{$post->title}}">

                    {{-- Description            --}}
                    <br>
                    <br>
                    <textarea
                        id="summary"
                        name="summary"
                        rows="10"
                        field="text"
                        class="w-full mt-6">
                        {{$post->summary}}
                    </textarea>

                    <img class="" src="{{url('storage/uploads/'.$post->image_filename)}}">
{{--                    <label for="image_filename">Select another image</label>--}}
                    <input type="file" name="image_filename" id="image_filename" value="{{url('storage/uploads/'.$post->image_filename)}}"
                           class="mb-5 block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500
                           focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                    file:bg-transparent file:border-0
                    file:bg-gray-100 file:mr-4
                    file:py-3 file:px-4
                    dark:file:bg-gray-700 dark:file:text-gray-400">

                    <input
                        type="number"
                        name="value"
                        field="value"
                        placeholder="(£) Value"
                        value="{{$post->value}}">

                    <br>
                    <br>
                    <label for="is_published">Viewable?</label>
                    <input id="is_published" type="checkbox" name="is_published" {{$post->is_published === 1 ? 'checked' : ''}}>


                    <br>
                    <x-save-button class="mt-5">Save
                    </x-save-button>
                </form>
{{--                <form action="{{route('posts.update', $post)}}" method="post">--}}
{{--                    @method('patch')--}}
{{--                    @csrf--}}
{{--                    <input--}}
{{--                        type="text"--}}
{{--                        name="title"--}}
{{--                        field="title"--}}
{{--                        class="w-full"--}}
{{--                        autocomplete="off"--}}
{{--                        value="{{$post->title}}">--}}
{{--                    <textarea--}}
{{--                        id="summary"--}}
{{--                        name="summary"--}}
{{--                        rows="10"--}}
{{--                        field="text"--}}
{{--                        class="w-full mt-6">{{$post->summary}}</textarea>--}}


{{--                    <input--}}
{{--                        type="text"--}}
{{--                        field="image_path"--}}
{{--                        name="image_path"--}}
{{--                        placeholder="Enter image URL"--}}
{{--                        autocomplete="off"--}}
{{--                        value="{{$post->image_path}}">--}}
{{--                    <input--}}
{{--                        type="number"--}}
{{--                        name="value"--}}
{{--                        field="value"--}}
{{--                        value="{{$post->value}}">--}}
{{--                    <br><br>--}}
{{--                    <button type="submit">Submit</button>--}}
{{--                </form>--}}
            </div>
        </div>
    </div>

</x-app-layout>
