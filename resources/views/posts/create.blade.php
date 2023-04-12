<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>



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
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input
                    type="text"
                    name="title"
                    field="title"
                    placeholder="Title"
                    class="w-full"
                    autocomplete="off"
                    value="{{@old('title')}}">

                {{-- Description            --}}
                    <br>
                    <br>
                    <textarea
                        id="summary"
                        name="summary"
                        rows="10"
                        field="text"
                        placeholder="Post description goes here..."
                        class="w-full mt-6">{{@old('summary')}}
                    </textarea>

                    <input type="file" name="image_filename" id="file-image_filename" class="mt-5 mb-5 block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                    file:bg-transparent file:border-0
                    file:bg-gray-100 file:mr-4
                    file:py-3 file:px-4
                    dark:file:bg-gray-700 dark:file:text-gray-400">

                    <input
                        type="number"
                        name="value"
                        field="value"
                        placeholder="(£) Value"
                        value="{{@old('value')}}">

                    <br>
                    <br>
                    <label for="is_published">Viewable?</label>


                    <input id="is_published" type="checkbox" name="is_published" value="1">


                    <br>
                    <button type="submit" class="mt-5 items-center px-4 py-2 bg-gray-800 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300
                            disabled:opacity-25 transition ease-in-out duration-150">Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
