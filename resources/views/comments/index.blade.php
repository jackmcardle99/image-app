<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Comments') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">--}}
{{--            <form method="post" action="{{ route('comments.store',$post)}}">--}}
{{--                @method('post')--}}
{{--                @csrf--}}
{{--                <textarea--}}
{{--                    class="min-h-[100px] w-3/4 resize-none rounded-[7px] border border-blue-gray-200--}}
{{--                     bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0--}}
{{--                     transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200--}}
{{--                     placeholder-shown:border-t-blue-gray-200 focus:ring-2 focus:ring-blue-500 focus:outline-none--}}
{{--                      disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50"--}}
{{--                    placeholder="Type comment here... " name="body" maxlength="250"></textarea>--}}
{{--                <input type="hidden" name="post_id"--}}
{{--                       value="{{$post->id}}"/>--}}
{{--                <div>--}}
{{--                    <button type="submit" class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent--}}
{{--                        rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700--}}
{{--                        active:text-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300--}}
{{--                        disabled:opacity-25 transition ease-in-out duration-150">Comment--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            @foreach($comments as $comment)--}}
{{--                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg dark:bg-gray-800">--}}
{{--                    <div class="flex">--}}
{{--                        <p>--}}
{{--                            <strong>{{ $comment->user->name}}  </strong> |--}}
{{--                        </p>--}}

{{--                        <p class="opacity-70 text-sm py-0.5 ">--}}
{{--                            {{$comment->created_at->diffForHumans()}}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <p class="break-all">{{ $comment->body }}</p>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--                {{$comments->links()}}--}}
{{--                <div class="grid md:grid-cols-3 grid-cols-1 gap-4">--}}
{{--                    <div>--}}

{{--                    </div>--}}

{{--            </div>--}}
{{--                <br>--}}

{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
