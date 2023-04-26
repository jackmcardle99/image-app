<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <x-alert>Something went Wrong...</x-alert>
            @endif
            @if (session('success'))
                <x-success-alert></x-success-alert>
            @endif
                <form action="#" method="GET" class="space-y-2 mb-6" id="table-form">
                    @csrf
                    @method('GET')
                    <select id="table-select" onchange="" class="rounded-lg dark:bg-gray-600 dark:text-slate-200">
                        <option value="">Choose Table</option>
                        <option value="posts">Posts</option>
                        <option value="comments">Comments</option>
                    </select>
                </form>

                <div class="relative overflow-x-auto">
                <table style="display: none" class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="postsTable">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Summary
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Filename
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Published
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Value
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Updated At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deleted At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Remove
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->id}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->user_id}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->title}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->summary}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->image_filename}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->is_published}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->value}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->created_at}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->updated_at}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$post->deleted_at}}
                        </th>
                        <th>
                            <form action="{{route('posts.edit',$post)}}" method="post" class="ml-auto mr-5">
                                @method('get')
                                @csrf
                                <x-primary-button>Edit
                                </x-primary-button>
                            </form>
                        </th>
                        <th>
                            <form action="{{route('posts.destroy',$post)}}" method="post" class="">
                                @method('delete')
                                @csrf
                                <x-danger-button onclick="return confirm('Post will be moved' +
                             ' to trash, are you sure you would like to perform this action?')">Delete
                                </x-danger-button>
                            </form>
                        </th>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <table style="display: none" class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="commentsTable">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Post ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Body
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Updated At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Remove
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$comment->id}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$comment->post_id}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$comment->user_id}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$comment->body}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$comment->created_at}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$comment->updated_at}}
                            </th>
                            <th>
                                <form action="{{route('comments.destroy', $comment)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <x-danger-button onclick="return confirm('Comment will be permanently deleted,' +
                                     ' are you sure you would like to perform this action?')">Delete
                                    </x-danger-button>
                                </form>
                            </th>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
