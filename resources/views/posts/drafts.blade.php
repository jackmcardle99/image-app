<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-slate-200 text-gray-800 leading-tight">
            {{ __('Drafts') }} <span class="icon-button_badge posts">{{$count}}</span>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="flashmessage alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 py-5 mb-4">
                    <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
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
        </div>
        <div class=" flex-auto flex space-x-4 justify-center">
            @if(request()->routeIs('posts.index'))
                <a href="{{route('posts.create')}}" class="btn-link">
                    <x-primary-button>+ Create Post</x-primary-button>
                </a>
            @endif
        </div>
        {{-- THIS IS THE PROBLEM WITH PADDING--}}
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            {{$posts->links()}}

            <div class="mt-16 ">
                <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-4">
                    @forelse($posts as $post)
                        <a href="{{route('posts.show',$post)}}" class="group relative block bg-black rounded-lg">
                            <img
                                src="{{url('storage/uploads/thumbnails/'.$post->image_filename)}}"
                                class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50 rounded-lg"
                            />

                            <div class="relative p-4 sm:p-6 lg:p-8">
                                <div class="flex inline-flex">
                                    <p class="text-sm font-semibold uppercase tracking-widest text-pink-500">
                                        {{$post->user->name}}
                                    </p>
                                    <div class="absolute inline-flex right-1 mr-5">
                                        <p class="text-sm font-semibold uppercase tracking-widest text-slate-200">
                                            £{{$post->value}}
                                        </p>
                                    </div>
                                </div>


                                <p class="text-xl font-bold text-white sm:text-2xl">{{$post->title}}</p>

                                <div class="mt-32 sm:mt-48 lg:mt-64">
                                    <div
                                        class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100"
                                    >
                                        <p class="text-sm dark:text-slate-200 text-white">
                                            {!! (Str::limit($post->summary, 40)) !!}
                                        </p>
                                        <p class="text-pink-500 block mt-4 text-sm">Views: {{$post->visit_count_total}}</p>
                                        <p class="text-pink-500 block  text-sm">Updated: {{$post->updated_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="my-6 p-6 mt-6">
                            <p class="text-center text-[#4f7ffb] mb-10 font-semibold">Just empty space...</p>
                            <svg class="mx-auto" fill="#4f7ffb" width="128px" height="128px" viewBox="0 0 128 128" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><title/><path d="M24.33,40.26a1,1,0,0,0,.25,0,1,1,0,0,0,.24,0A39.76,39.76,0,0,0,44.17,29l.48-.51a1,1,0,0,0,.25-.44,16.8,16.8,0,0,0-1.85-12.79A17.06,17.06,0,0,0,20.64,9a16.87,16.87,0,0,0,3.69,31.25ZM14.22,19.89a14.79,14.79,0,0,1,7.35-9.12,14.55,14.55,0,0,1,6.85-1.69,15.06,15.06,0,0,1,12.91,7.23,14.77,14.77,0,0,1,1.69,11l-.3.32A37.79,37.79,0,0,1,24.59,38.26,14.87,14.87,0,0,1,14.22,19.89Z"/><path d="M37.21,24.26a1,1,0,0,0,1,1h0a1,1,0,0,0,1-1c-.26-5.92-6.64-10.9-6.91-11.11a1,1,0,0,0-1.41.19,1,1,0,0,0,.19,1.4C31.13,14.69,37,19.27,37.21,24.26Z"/><path d="M58.5,47.72a6.36,6.36,0,0,0-8.69-2.22L36.66,53.29A6.35,6.35,0,0,0,34.44,62L41,73.08A6.35,6.35,0,0,0,49.7,75.3l13.15-7.79a6.34,6.34,0,0,0,2.23-8.68Zm5.32,15.41a4.3,4.3,0,0,1-2,2.66L48.68,73.58a4.34,4.34,0,0,1-5.94-1.52l-2.46-4.14L48,63.35A1,1,0,0,0,48.35,62,1,1,0,0,0,47,61.63L39.27,66.2l-2.34-3.94,13.15-7.78a1,1,0,0,0,.35-1.37,1,1,0,0,0-1.37-.35L36,60.51A4.32,4.32,0,0,1,37.68,55l13.15-7.79a4.36,4.36,0,0,1,6,1.52l6.57,11.11A4.28,4.28,0,0,1,63.82,63.13Z"/><path d="M46.53,40.38a1,1,0,0,0-1.41-.14c-6.72,5.52-11.95,6.49-12,6.5a1,1,0,0,0,.17,2l.16,0c.24,0,5.78-1,13-6.93A1,1,0,0,0,46.53,40.38Z"/><path d="M55.55,58.89a3.2,3.2,0,0,0-1.12,4.37,3.16,3.16,0,0,0,2,1.47,3.08,3.08,0,0,0,.8.1,3.15,3.15,0,0,0,1.62-.45,3.22,3.22,0,0,0,1.47-1.95A3.15,3.15,0,0,0,59.93,60,3.2,3.2,0,0,0,55.55,58.89Zm2.79,3a1.16,1.16,0,0,1-.55.73,1.19,1.19,0,0,1-.9.13,1.19,1.19,0,0,1-.32-2.18,1.13,1.13,0,0,1,.61-.17,1.2,1.2,0,0,1,1.16,1.49Z"/><path d="M7.3,42.19C5.12,45.84,5,49.55,6.89,52.94L17.36,70.63a52.67,52.67,0,0,0,5.26,18.58,1,1,0,0,0,.23.31L24.43,93a7,7,0,0,0,3.94,3.65,7.2,7.2,0,0,0,2.45.44,7,7,0,0,0,6.56-4.58,7,7,0,0,0,.43-2.06l4.44-2.63,15.63,26.4a6.68,6.68,0,0,0-1.09,8.17l.56,1a6.62,6.62,0,0,0,4.09,3,6.33,6.33,0,0,0,1.67.22,6.67,6.67,0,0,0,3.38-.93L78,118.83A3.57,3.57,0,0,0,79.22,114l-2.14-3.62-.21-.31-12-20.23a2.28,2.28,0,0,1-.25-1.73,2.32,2.32,0,0,1,1.06-1.41,2.3,2.3,0,0,1,3.13.81L80.76,107.6c.08.16.16.32.25.48l2.15,3.62a3.55,3.55,0,0,0,3.07,1.74A3.62,3.62,0,0,0,88,113h0l11.48-6.81A6.69,6.69,0,0,0,101.86,97l-.56-.94a6.68,6.68,0,0,0-7.68-3L78.08,66.86l4-2.39a7.14,7.14,0,0,0,3.43.9,7,7,0,0,0,5.63-11.2l-2.86-3.89h0A52.45,52.45,0,0,0,73.43,36l0,0L69,28.47a12,12,0,0,0,5.09-.78c.62-.21,1.23-.45,1.84-.69a18.24,18.24,0,0,1,4.4-1.32,8.61,8.61,0,0,1,5.58,1.21,18.17,18.17,0,0,1,2.48,1.94,13.59,13.59,0,0,0,4.46,2.94,7.44,7.44,0,0,0,2.31.37c3.79,0,7.46-2.88,9.46-6.27.36-.63.71-1.29,1.06-1.95,1.29-2.43,2.5-4.73,4.72-5.47a9.65,9.65,0,0,1,3.48-.25c.57,0,1.13.05,1.7,0,2.73,0,4.79-1.18,5.51-3a1,1,0,0,0-1.86-.72c-.49,1.26-2.23,1.74-3.69,1.76-.52,0-1,0-1.57,0a11.21,11.21,0,0,0-4.21.34c-3,1-4.5,3.89-5.85,6.44-.33.63-.66,1.26-1,1.86-2,3.39-5.86,6.2-9.4,5a11.69,11.69,0,0,1-3.78-2.55,20.82,20.82,0,0,0-2.75-2.14,10.78,10.78,0,0,0-6.88-1.49,19.75,19.75,0,0,0-4.87,1.45c-.59.23-1.18.46-1.78.66-2.46.86-4.38.94-5.86.26h0l-4-6.69c-4.43-7.47-11.34-5.75-13.83-4.81-.27-.56-.54-1.12-.86-1.66A23.35,23.35,0,0,0,18.22,4,23.13,23.13,0,0,0,9,36.32c.43.71.89,1.4,1.38,2.06A17.74,17.74,0,0,0,7.3,42.19ZM33.08,83,24,87.44A51,51,0,0,1,19.5,72l4.2-.42a1,1,0,0,0,.89-1.07,60.2,60.2,0,0,1,.31-10.4,1,1,0,0,0-.24-.79,1,1,0,0,0-.75-.33H19.75a52.67,52.67,0,0,1,1.59-6.92c1.95,1,7.08,4.26,7.19,13C28.6,70.87,32,80.13,33.08,83ZM19.48,61h3.31a62.37,62.37,0,0,0-.25,8.69L19.31,70A46.92,46.92,0,0,1,19.48,61Zm16,30.77a5,5,0,0,1-2.61,2.82,5,5,0,0,1-6.65-2.46l-1.34-2.91,9-4.39,1.43,3.11A5,5,0,0,1,35.51,91.76Zm2.07-3.55a6.82,6.82,0,0,0-.4-1.12L35.32,83a1,1,0,0,0-.19-.26,87.45,87.45,0,0,1-4.22-14.13L41.23,86.05ZM77,117.11h0l-11.48,6.8a4.69,4.69,0,0,1-6.4-1.64l-.56-1a4.63,4.63,0,0,1,1.14-6l.05,0s.06-.06.09-.09.23-.18.36-.26L69,109.71a4.64,4.64,0,0,1,2.36-.65,4.77,4.77,0,0,1,1.18.15,4.63,4.63,0,0,1,2.74,2l1.21,2a.76.76,0,0,0,.08.11l1,1.63A1.56,1.56,0,0,1,77,117.11Zm-9-32.64a4.29,4.29,0,0,0-4.76,6.34l3.4,5.75-7.92,4.69a1,1,0,0,0-.35,1.37,1,1,0,0,0,.86.49,1,1,0,0,0,.51-.14l7.92-4.69,5.32,9a6.6,6.6,0,0,0-5,.73l-8.44,5L30.61,64.2a1.5,1.5,0,0,0-.11-.13,16.58,16.58,0,0,0-4.62-11.15A13.93,13.93,0,0,0,22,50.16l.23-.65a6.87,6.87,0,0,1,1.71-2.67l6.4-2.09a39.49,39.49,0,0,0,14.22-8.19L50.74,31a28.57,28.57,0,0,1,3.48.23,13.76,13.76,0,0,0,.54,4.61c.82,2.82,2.94,6.82,8.4,9.91l.19.07a.75.75,0,0,0,.08.24L91.8,93.94l-8.45,5a6.59,6.59,0,0,0-3,4l-4-6.67,7.82-4.63a1,1,0,0,0-1-1.73l-7.81,4.63-2.51-4.23,4-2.39a1,1,0,1,0-1-1.72l-4,2.39-1.28-2.15A4.21,4.21,0,0,0,67.93,84.47ZM95.55,94.8a4.67,4.67,0,0,1,4,2.28l.56,1a4.68,4.68,0,0,1-1.64,6.39L87,111.22a1.56,1.56,0,0,1-2.14-.54l-2.11-3.56a.56.56,0,0,0,0-.12l-.11-.18a4.66,4.66,0,0,1,1.75-6.15l8.81-5.22A4.68,4.68,0,0,1,95.55,94.8ZM67.25,48.56a105.4,105.4,0,0,1,9.66,9.9l3,4.08a7.49,7.49,0,0,0,.51.61l-3.36,2ZM90.5,59.08a5,5,0,0,1-9,2.27L79.1,58.07l8.19-5.81,2.28,3.1A4.94,4.94,0,0,1,90.5,59.08Zm-4.39-8.44L77.86,56.5c-2-2.32-8.56-9.64-13.52-12.61a1,1,0,0,0-.56-.12c-7.19-4.24-7.68-10.09-7.58-12.28a44.09,44.09,0,0,1,8.47,2.37l-2,3.65a1,1,0,0,0,1.76,1l2.08-3.84,1.28.6L66.64,37a1,1,0,0,0,.3,1.38,1,1,0,0,0,.54.16,1,1,0,0,0,.84-.46l1.29-2A49.3,49.3,0,0,1,86.11,50.64ZM61.86,20.39,69.93,34a46.36,46.36,0,0,0-6.53-2.79A41.5,41.5,0,0,0,51.57,29a22.9,22.9,0,0,0-1-12.6C52.57,15.6,58.18,14.18,61.86,20.39ZM8.59,18.75A20.94,20.94,0,0,1,19.15,5.8a20.58,20.58,0,0,1,9.59-2.34A21.33,21.33,0,0,1,47.16,13.91a21,21,0,0,1,2.29,15.54l-6.27,5.62a37.69,37.69,0,0,1-13.51,7.78l-6.32,2.06A21.11,21.11,0,0,1,8.59,18.75Zm13,27.69a8.76,8.76,0,0,0-1.29,2.4A54.48,54.48,0,0,0,17.6,60s0,0,0,0h0a48.81,48.81,0,0,0-.43,6.37L8.62,51.94c-3.08-5.46,1.26-10.35,3-12A22.9,22.9,0,0,0,21.59,46.44Z"/><path d="M108.36,81.24a1,1,0,0,0,1-.7,10.6,10.6,0,0,1,7-7,1,1,0,0,0,.7-1,1,1,0,0,0-.7-1,10.64,10.64,0,0,1-7-7,1,1,0,0,0-1-.71,1,1,0,0,0-1,.71,10.66,10.66,0,0,1-7,7,1,1,0,0,0-.71,1,1,1,0,0,0,.71,1,10.62,10.62,0,0,1,7,7A1,1,0,0,0,108.36,81.24Zm-5.11-8.69a12.64,12.64,0,0,0,5.11-5.11,12.66,12.66,0,0,0,5.12,5.11,12.62,12.62,0,0,0-5.12,5.12A12.6,12.6,0,0,0,103.25,72.55Z"/><path d="M117.86,50.2a1,1,0,0,0-1-.71,1,1,0,0,0-1,.71,5.88,5.88,0,0,1-3.88,3.88,1,1,0,0,0-.7,1,1,1,0,0,0,.7,1A5.84,5.84,0,0,1,116,59.87a1,1,0,0,0,1,.71,1,1,0,0,0,1-.71A5.88,5.88,0,0,1,121.75,56a1,1,0,0,0,.7-1,1,1,0,0,0-.7-1A5.9,5.9,0,0,1,117.86,50.2Zm-1,7.06A8,8,0,0,0,114.68,55a7.86,7.86,0,0,0,2.23-2.22A7.82,7.82,0,0,0,119.13,55,8,8,0,0,0,116.91,57.26Z"/><path d="M15.27,117.28a1,1,0,0,0,1.91,0,5.52,5.52,0,0,1,3.64-3.64,1,1,0,0,0,.71-1,1,1,0,0,0-.71-1,5.5,5.5,0,0,1-3.64-3.64,1,1,0,0,0-1.91,0,5.5,5.5,0,0,1-3.64,3.64,1,1,0,0,0-.71,1,1,1,0,0,0,.71,1A5.52,5.52,0,0,1,15.27,117.28Zm1-6.6a7.39,7.39,0,0,0,2,2,7.26,7.26,0,0,0-2,2,7.43,7.43,0,0,0-2-2A7.57,7.57,0,0,0,16.23,110.68Z"/></svg>
                        </div>
                    @endforelse
                </div><br>
            </div>
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>