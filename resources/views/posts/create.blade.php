<x-app-layout>
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
            <div class="my-6 p-6 bg-white dark:bg-gray-800 border-b border-gray-200 shadow-sm sm:rounded-lg items-center">
                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="ml-[20%]">

                        {{-- Title            --}}
                        <x-input-label class="font-semibold text-xl ml-5">Title</x-input-label>
                        <x-text-input type="text" name="title" field="title"  class=" py-5 px-4 h-2 w-3/4 " autocomplete="off" value="{{@old('title')}}"></x-text-input>

                        {{-- Description            --}}
                        <x-input-label class="mt-10 font-semibold text-xl ml-5">Summary</x-input-label>
                        <textarea
                            id="summary"
                            name="summary"
                            rows="10"
                            field="text"
                            class="ml-auto mx-auto dark:bg-gray-600  dark:text-slate-200 min-h-[100px] w-3/4 resize-none rounded-[7px] border border-blue-gray-200
                         bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0
                         transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200
                         placeholder-shown:border-t-blue-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none
                          disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50">
                        {{@old('summary')}}
                    </textarea>

                        {{-- Select an iamge            --}}
                        <x-input-label class="font-semibold text-xl mt-10 ml-5">Select an image</x-input-label>
                        <input type="file" name="image_filename" id="image_filename"
                               class="block w-3/4 border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500
                           focus:ring-blue-500 dark:bg-gray-600 dark:border-gray-700 dark:text-gray-400
                    file:bg-transparent file:border-0
                    file:bg-gray-100 file:mr-4
                    file:py-3 file:px-4
                    dark:file:bg-gray-700 dark:file:text-gray-400">

                        {{--                     {{--Value--}}
                        <x-input-label class="font-semibold text-xl mt-10 ml-5">Value</x-input-label>
                        <x-text-input class="w-3/4 h-10" type="number" name="value" field="value" placeholder="(£) Value" value="{{@old('value')}}"></x-text-input>

                        <br>
                        <x-input-label class="font-semibold text-xl mt-10 ml-5" for="select_category">
                            Select Categories
                        </x-input-label>
                        @foreach($categories as $category)
                            <input type="checkbox" name="select_category[{{$category->id}}]" class="select_category  mb-1 mr-1 rounded-lg border-b border-gray-900" value="{{$category->id}}">{{$category->topic}}</input>
                        @endforeach

{{--

                        {{--Published--}}
                        <x-input-label class="font-semibold text-xl mt-10 ml-5" for="is_published">Publish?</x-input-label>
                        <input id="is_published" type="checkbox" name="is_published" class="mb-1 mr-1 rounded-lg border-b border-gray-900"> True
                    </div>
                    <x-save-button class="mt-5 ml-[50%] md:scale-125 ">Save </x-save-button>
            </div>
            </div>

{{--            <div class="my-6 p-6 bg-white dark:bg-gray-800 border-b border-gray-200 shadow-sm sm:rounded-lg">--}}
{{--                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <input--}}
{{--                    type="text"--}}
{{--                    name="title"--}}
{{--                    field="title"--}}
{{--                    placeholder="Title"--}}
{{--                    class="w-full"--}}
{{--                    autocomplete="off"--}}
{{--                    value="{{@old('title')}}">--}}
{{--                    --}}{{-- Title            --}}
{{--                    <x-input-label class="font-semibold text-xl ml-5">Title</x-input-label>--}}
{{--                    <x-text-input type="text" name="title" field="title"  class=" py-5 px-4 h-2 w-3/4 " autocomplete="off" value="{{@old('title')}}"></x-text-input>--}}


{{--                    --}}{{-- Description            --}}
{{--                    <br>--}}
{{--                    <br>--}}
{{--                    <textarea--}}
{{--                        id="summary"--}}
{{--                        name="summary"--}}
{{--                        rows="10"--}}
{{--                        field="text"--}}
{{--                        placeholder="Post description goes here..."--}}
{{--                        class="w-full mt-6 text-white"--}}
{{--                        >{{@old('summary')}}--}}
{{--                    </textarea>--}}

{{--                    <input type="file" name="image_filename" id="file-image_filename" class="mt-5 mb-5 block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400--}}
{{--                    file:bg-transparent file:border-0--}}
{{--                    file:bg-gray-100 file:mr-4--}}
{{--                    file:py-3 file:px-4--}}
{{--                    dark:file:bg-gray-700 dark:file:text-gray-400">--}}

{{--                    <input--}}
{{--                        type="number"--}}
{{--                        name="value"--}}
{{--                        field="value"--}}
{{--                        placeholder="(£) Value"--}}
{{--                        value="{{@old('value')}}">--}}

{{--                    <br>--}}
{{--                    <br>--}}
{{--                    <label for="is_published">Viewable?</label>--}}

{{--                    <input id="is_published" type="checkbox" name="is_published">--}}

{{--                    <fieldset>--}}
{{--                        <legend>Select categories</legend>--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <div>--}}
{{--                                <input type="checkbox" name="{{$category->topic}}"/>--}}
{{--                                <label for="{{$category->topic}}">{{$category->topic}}</label>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </fieldset>--}}


{{--                    <br>--}}
{{--                    <x-save-button class="mt-5">Create--}}
{{--                    </x-save-button>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    </div>

</x-app-layout>
