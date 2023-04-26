<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="pb-8">
                @if ($errors->any())
                    <x-alert>Something went Wrong...</x-alert>
                @endif
                @if (session('success'))
                    <x-success-alert></x-success-alert>
                @endif
            </div>
            <div class="my-6 p-6 bg-white dark:bg-gray-800 border-b border-gray-200 shadow-sm sm:rounded-lg items-center">

                <form action="{{route('posts.update', $post)}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="ml-[20%]">

                        {{-- Title            --}}
                        <x-input-label class="font-semibold text-xl ml-5" for="title">Title</x-input-label>
                        <x-text-input type="text" name="title" field="title"  class=" py-5 px-4 h-2 w-3/4 " autocomplete="off" value="{{$post->title}}"></x-text-input>

                        {{-- Description            --}}
                        <x-input-label class="mt-10 font-semibold text-xl ml-5" for="summary">Summary</x-input-label>
                        <textarea
                            id="summary"
                            name="summary"
                            field="text"
                            class="dark:bg-gray-600  dark:text-slate-200 min-h-[100px] w-3/4 resize-none rounded-[7px] border border-blue-gray-200
                         bg-gray-100  font-sans text-sm font-normal text-blue-gray-700 outline outline-0
                         transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200
                         placeholder-shown:border-t-blue-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none
                          disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50">
                        {{$post->summary}}
                    </textarea>

                        {{-- Select an iamge            --}}
                        <x-input-label class="font-semibold text-xl mt-10 ml-5" for="image_filename">Select a new image (optional)</x-input-label>
                        <input type="file" name="image_filename" id="image_filename" value="{{url('storage/uploads/'.$post->image_filename)}}"
                               class="block w-3/4 border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500
                           focus:ring-blue-500 dark:bg-gray-600 dark:border-gray-700 dark:text-gray-400
                    file:bg-transparent file:border-0
                    file:bg-gray-100 file:mr-4
                    file:py-3 file:px-4
                    dark:file:bg-gray-700 dark:file:text-gray-400" accept="image/*">
                        <x-input-label class="font-semibold text-xl mt-10 ml-5">Current Image</x-input-label>
                        <img class="" src="{{url('storage/uploads/'.$post->image_filename)}}" height="500" width="700">

{{--                     {{--Value--}}
                        <x-input-label class="font-semibold text-xl mt-10 ml-5" for="value">Value</x-input-label>
                        <x-text-input class="w-3/4 h-10" type="number" name="value" field="value" placeholder="(£) Value" value="{{$post->value}}"></x-text-input>

                        <x-input-label class="font-semibold text-xl mt-10 ml-5" for="select_category">
                            Select Categories
                        </x-input-label>
                        @foreach($categories as $category)
                            <input type="checkbox" name="select_category[]" class="form-check-input dark:bg-gray-600 dark:text-slate-200" id="category_{{$category->id}}" value="{{$category->id}}" {{in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'checked' : ''}}>
                            <p class="inline-flex dark:text-slate-200">{{$category->topic}}</p>
                        @endforeach

                        {{--Published--}}
                        <x-input-label class="font-semibold text-xl mt-10 ml-5" for="is_published">Publish?</x-input-label>
                        <input id="is_published" type="checkbox" name="is_published" class="ml-5" {{$post->is_published === 1 ? 'checked' : ''}}>
                        <p class="inline-flex dark:text-slate-200">True</p>
                    </div>
                    <x-save-button class="mt-5 ml-[50%] md:scale-125 ">Save </x-save-button>
                </form>
            </div>

        </div>
    </div>

</x-app-layout>
