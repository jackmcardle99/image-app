<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="flashmessage alert bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Something went Wrong...
                </div>
                <ul class="flashmessage alert border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 mb-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @if (session('success'))
                <div
                    class="flashmessage alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 py-5 mb-4">
                    <div
                        class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                <span class="text-green-500">
                <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"></path>
                </svg>
                </span>
                    </div>
                    <div class="alert-content ml-4">
                        <div class="alert-title font-semibold text-lg text-green-800">
                            {{ __('Success') }}
                        </div>
                        <div class="alert-description text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif
{{--            <div class="relative overflow-x-auto">--}}
{{--                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">--}}
{{--                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">--}}
{{--                    <tr>--}}
{{--                        <th scope="col" class="px-6 py-3 ">--}}
{{--                            ID--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            User ID--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Title--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Summary--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Filename--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Published--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Value--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Created At--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Updated At--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Deleted At--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Edit--}}
{{--                        </th>--}}
{{--                        <th scope="col" class="px-6 py-3">--}}
{{--                            Remove--}}
{{--                        </th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($posts as $post)--}}
{{--                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">--}}

{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->id}}--}}
{{--                            </th>--}}
{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->user_id}}--}}
{{--                            </th>--}}
{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->title}}--}}
{{--                            </th>--}}
{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->summary}}--}}
{{--                            </th>--}}
{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->image_filename}}--}}
{{--                            </th>--}}
{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->is_published}}--}}
{{--                            </th>--}}
{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->value}}--}}
{{--                            </th>--}}
{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->created_at}}--}}
{{--                            </th>--}}
{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->updated_at}}--}}
{{--                            </th>--}}
{{--                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">--}}
{{--                                {{$post->deleted_at}}--}}
{{--                            </th>--}}
{{--                            <th>--}}
{{--                                <form action="{{route('posts.edit',$post)}}" method="post" class="ml-auto mr-5">--}}
{{--                                    @method('get')--}}
{{--                                    @csrf--}}
{{--                                    <button class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent--}}
{{--                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700--}}
{{--                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300--}}
{{--                            disabled:opacity-25 transition ease-in-out duration-150">Edit--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </th>--}}
{{--                            <th>--}}
{{--                                <form action="{{route('posts.destroy',$post)}}" method="post" class="">--}}
{{--                                    @method('delete')--}}
{{--                                    @csrf--}}
{{--                                    <button class=" inline-flex items-center px-4 py-2 bg-red-800 border border-transparent--}}
{{--                            rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700--}}
{{--                            active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300--}}
{{--                            disabled:opacity-25 transition ease-in-out duration-150" onclick="confirm('Post will be moved' +--}}
{{--                             ' to trash, are you sure you would like to perform this action?')">Delete--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </th>--}}

{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($comments)
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->body }}</td>
                            </tr>
                        @endforeach
                    @endif
                    @else
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</x-app-layout>
