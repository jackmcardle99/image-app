<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IndieScene</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Fav icon -->
        <link rel="shortcut icon" sizes="28x28" href="{{ asset('newSvg.svg') }}">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gradient-to-tr from-indigo-900 to-pink-900">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen  selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/posts') }}" class="font-semibold text-slate-200 hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Posts</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-slate-200 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-slate-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
    @endif

            <div class="max-w-7xl mx-auto p-6 lg:px-8">
                <div class="flex justify-center">
                    <x-application-logo-large></x-application-logo-large>
                </div>
                <div class="flex justify-center mt-10">
                    <svg id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="400" height="25.036284470246734" viewBox="0, 0, 400,55.036284470246734"><g id="svgg"><path id="path0" d="M97.531 13.788 L 97.530 27.576 96.980 26.471 C 91.567 15.598,76.436 14.049,68.228 23.529 C 57.585 35.820,66.009 54.861,82.090 54.861 C 89.157 54.861,94.943 51.228,97.485 45.195 L 97.843 44.344 97.920 47.745 C 97.962 49.616,97.997 51.813,97.997 52.627 L 97.997 54.107 100.145 54.107 L 102.293 54.107 102.293 27.054 L 102.293 0.000 99.913 0.000 L 97.533 0.000 97.531 13.788 M193.033 2.911 C 182.968 3.493,177.068 8.701,177.068 17.003 C 177.068 24.425,181.411 28.351,193.962 32.276 C 202.346 34.898,204.871 36.715,205.340 40.464 C 206.091 46.455,196.607 49.824,189.434 46.114 C 187.091 44.902,184.964 41.925,184.964 39.857 L 184.964 39.594 180.435 39.594 L 175.907 39.594 175.907 39.980 C 175.907 42.012,177.048 45.322,178.495 47.489 C 185.001 57.234,205.615 57.730,212.022 48.296 C 215.081 43.791,215.062 36.638,211.981 32.569 C 209.411 29.175,206.723 27.847,194.362 23.864 C 188.435 21.954,186.189 20.059,186.034 16.837 C 185.855 13.123,188.831 10.538,193.780 10.108 C 199.015 9.653,203.159 12.099,204.392 16.372 L 204.677 17.358 209.157 17.389 L 213.638 17.419 213.587 17.099 C 213.139 14.238,212.793 13.019,211.946 11.313 C 209.047 5.471,202.105 2.387,193.033 2.911 M117.378 3.367 C 114.139 3.923,113.447 8.288,116.366 9.747 C 118.266 10.696,120.749 9.793,121.387 7.919 C 122.253 5.378,120.075 2.905,117.378 3.367 M0.000 28.853 L 0.000 54.107 2.496 54.107 L 4.993 54.107 4.993 28.853 L 4.993 3.599 2.496 3.599 L 0.000 3.599 0.000 28.853 M239.212 16.612 C 224.508 17.742,215.878 33.041,223.087 45.201 C 228.968 55.122,242.696 58.131,252.402 51.626 C 256.143 49.119,259.005 45.065,259.686 41.306 L 259.765 40.871 255.354 40.871 L 250.943 40.871 250.787 41.248 C 248.661 46.405,241.342 48.794,235.740 46.158 C 227.580 42.320,226.817 31.125,234.369 26.045 C 239.893 22.329,247.738 24.204,250.612 29.927 L 250.918 30.537 255.338 30.537 L 259.757 30.537 259.675 30.160 C 258.301 23.856,252.179 18.333,245.036 16.955 C 243.991 16.753,241.075 16.458,240.581 16.504 C 240.485 16.513,239.869 16.562,239.212 16.612 M284.006 16.616 C 267.797 17.770,259.840 36.200,270.337 48.277 C 279.318 58.611,298.368 56.754,304.197 44.977 C 304.969 43.416,305.387 43.616,300.872 43.383 C 298.716 43.271,296.842 43.158,296.706 43.130 C 296.510 43.090,296.377 43.215,296.047 43.751 C 293.306 48.192,284.539 49.395,279.356 46.042 C 276.947 44.484,274.369 40.543,274.369 38.420 C 274.369 38.360,281.019 38.316,290.119 38.316 L 305.869 38.316 305.788 36.952 C 305.163 26.349,299.163 18.706,290.091 16.955 C 289.038 16.752,286.046 16.458,285.515 16.505 C 285.419 16.514,284.740 16.564,284.006 16.616 M333.933 16.608 C 329.267 17.027,325.081 19.805,322.946 23.899 C 322.600 24.563,322.485 24.704,322.422 24.538 C 322.356 24.363,321.961 18.309,321.971 17.620 C 321.974 17.430,321.715 17.417,318.142 17.417 L 314.311 17.417 314.311 35.762 L 314.311 54.107 318.661 54.107 L 323.011 54.107 323.046 43.687 L 323.082 33.266 323.349 32.337 C 325.911 23.412,336.245 21.324,341.092 28.751 C 342.930 31.567,342.990 32.060,342.990 44.380 L 342.990 54.107 347.286 54.107 L 351.582 54.107 351.581 43.861 C 351.580 33.362,351.530 31.866,351.115 29.827 C 349.374 21.286,342.317 15.856,333.933 16.608 M378.220 16.609 C 367.543 17.328,359.894 25.322,359.894 35.762 C 359.894 42.487,362.745 47.855,368.289 51.571 C 378.257 58.251,393.364 54.945,398.344 44.993 C 399.135 43.410,399.555 43.615,395.037 43.383 C 392.881 43.273,391.005 43.159,390.867 43.130 C 390.670 43.089,390.554 43.184,390.323 43.579 C 387.656 48.130,378.765 49.434,373.523 46.043 C 371.053 44.445,369.122 41.583,368.603 38.752 L 368.524 38.316 384.276 38.316 L 400.028 38.316 399.950 37.068 C 399.282 26.272,393.476 18.841,384.241 16.959 C 383.251 16.757,380.221 16.456,379.681 16.506 C 379.585 16.515,378.927 16.561,378.220 16.609 M36.401 17.301 C 31.101 17.777,26.352 21.392,24.149 26.627 C 23.630 27.861,23.574 27.773,23.572 25.708 C 23.571 24.936,23.536 22.886,23.494 21.151 L 23.417 17.997 21.288 17.997 L 19.158 17.997 19.158 36.052 L 19.158 54.107 21.534 54.107 L 23.910 54.107 23.950 43.803 C 23.988 33.787,23.996 33.470,24.234 32.511 C 27.829 17.990,45.620 17.841,48.912 32.304 C 49.150 33.349,49.159 33.697,49.200 43.745 L 49.243 54.107 51.624 54.107 L 54.005 54.107 53.959 43.338 C 53.907 31.451,53.925 31.754,53.121 28.970 C 50.928 21.373,44.102 16.609,36.401 17.301 M148.157 17.304 C 130.695 18.637,124.296 41.242,138.520 51.350 C 147.962 58.061,162.838 54.974,167.691 45.297 C 167.995 44.691,168.244 44.153,168.244 44.100 C 168.244 44.048,167.180 44.006,165.879 44.006 L 163.514 44.006 163.063 44.788 C 160.213 49.731,151.879 52.238,145.410 50.099 C 140.051 48.327,136.195 43.688,135.445 38.113 L 135.363 37.504 152.280 37.504 L 169.198 37.504 169.121 36.313 C 168.347 24.391,159.571 16.432,148.157 17.304 M115.646 36.052 L 115.646 54.107 118.026 54.107 L 120.406 54.107 120.406 36.052 L 120.406 17.997 118.026 17.997 L 115.646 17.997 115.646 36.052 M152.610 21.554 C 157.421 22.348,161.411 25.537,163.299 30.098 C 163.737 31.155,164.295 33.077,164.296 33.527 L 164.296 33.788 149.888 33.788 L 135.480 33.788 135.557 33.295 C 136.823 25.160,144.099 20.150,152.610 21.554 M85.443 21.786 C 94.877 23.456,100.217 33.672,96.135 42.245 C 90.810 53.430,75.141 53.614,69.781 42.554 C 64.560 31.780,73.667 19.701,85.443 21.786 M288.368 23.869 C 291.726 24.462,294.310 26.314,295.815 29.207 C 296.289 30.119,296.894 31.738,296.894 32.096 C 296.894 32.261,295.800 32.279,285.639 32.279 L 274.383 32.279 274.615 31.445 C 276.178 25.805,281.798 22.709,288.368 23.869 M382.758 23.916 C 385.992 24.556,388.613 26.487,390.014 29.260 C 390.366 29.957,391.060 31.850,391.060 32.114 C 391.060 32.255,389.450 32.279,379.797 32.279 C 373.602 32.279,368.534 32.255,368.534 32.227 C 368.534 31.944,369.241 30.049,369.617 29.322 C 371.882 24.943,377.101 22.796,382.758 23.916 " stroke="none" fill="#F1EDF2" fill-rule="evenodd"></path></g></svg>
                </div>
                <div class="mt-16 ">
                    <div class="grid md:grid-flow-col grid-flow-row  sm:auto-cols-1 gap-6 lg:gap-8">
                        @forelse($posts as $post)
                    <a href="{{route('posts.show',$post)}}" class="group relative block bg-black rounded-lg">
                        <img
                            alt="Developer"
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
                                    <p class="text-sm text-white">
                                        {!! html_entity_decode(Str::limit($post->summary, 40)) !!}
                                    </p>
                                    <p class="text-pink-500 block mt-4 text-sm">Views: {{$post->visit_count_total}}</p>
                                    <p class="text-pink-500 block  text-sm">Updated: {{$post->updated_at->diffForHumans()}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class=" my-6 p-6 mt-6">
                        <p class="text-center text-[#4f7ffb] mb-10 font-semibold">No posts to see, just empty space...</p>
                        <svg class="mx-auto" fill="#4f7ffb" width="128px" height="128px" viewBox="0 0 128 128" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><title/><path d="M24.33,40.26a1,1,0,0,0,.25,0,1,1,0,0,0,.24,0A39.76,39.76,0,0,0,44.17,29l.48-.51a1,1,0,0,0,.25-.44,16.8,16.8,0,0,0-1.85-12.79A17.06,17.06,0,0,0,20.64,9a16.87,16.87,0,0,0,3.69,31.25ZM14.22,19.89a14.79,14.79,0,0,1,7.35-9.12,14.55,14.55,0,0,1,6.85-1.69,15.06,15.06,0,0,1,12.91,7.23,14.77,14.77,0,0,1,1.69,11l-.3.32A37.79,37.79,0,0,1,24.59,38.26,14.87,14.87,0,0,1,14.22,19.89Z"/><path d="M37.21,24.26a1,1,0,0,0,1,1h0a1,1,0,0,0,1-1c-.26-5.92-6.64-10.9-6.91-11.11a1,1,0,0,0-1.41.19,1,1,0,0,0,.19,1.4C31.13,14.69,37,19.27,37.21,24.26Z"/><path d="M58.5,47.72a6.36,6.36,0,0,0-8.69-2.22L36.66,53.29A6.35,6.35,0,0,0,34.44,62L41,73.08A6.35,6.35,0,0,0,49.7,75.3l13.15-7.79a6.34,6.34,0,0,0,2.23-8.68Zm5.32,15.41a4.3,4.3,0,0,1-2,2.66L48.68,73.58a4.34,4.34,0,0,1-5.94-1.52l-2.46-4.14L48,63.35A1,1,0,0,0,48.35,62,1,1,0,0,0,47,61.63L39.27,66.2l-2.34-3.94,13.15-7.78a1,1,0,0,0,.35-1.37,1,1,0,0,0-1.37-.35L36,60.51A4.32,4.32,0,0,1,37.68,55l13.15-7.79a4.36,4.36,0,0,1,6,1.52l6.57,11.11A4.28,4.28,0,0,1,63.82,63.13Z"/><path d="M46.53,40.38a1,1,0,0,0-1.41-.14c-6.72,5.52-11.95,6.49-12,6.5a1,1,0,0,0,.17,2l.16,0c.24,0,5.78-1,13-6.93A1,1,0,0,0,46.53,40.38Z"/><path d="M55.55,58.89a3.2,3.2,0,0,0-1.12,4.37,3.16,3.16,0,0,0,2,1.47,3.08,3.08,0,0,0,.8.1,3.15,3.15,0,0,0,1.62-.45,3.22,3.22,0,0,0,1.47-1.95A3.15,3.15,0,0,0,59.93,60,3.2,3.2,0,0,0,55.55,58.89Zm2.79,3a1.16,1.16,0,0,1-.55.73,1.19,1.19,0,0,1-.9.13,1.19,1.19,0,0,1-.32-2.18,1.13,1.13,0,0,1,.61-.17,1.2,1.2,0,0,1,1.16,1.49Z"/><path d="M7.3,42.19C5.12,45.84,5,49.55,6.89,52.94L17.36,70.63a52.67,52.67,0,0,0,5.26,18.58,1,1,0,0,0,.23.31L24.43,93a7,7,0,0,0,3.94,3.65,7.2,7.2,0,0,0,2.45.44,7,7,0,0,0,6.56-4.58,7,7,0,0,0,.43-2.06l4.44-2.63,15.63,26.4a6.68,6.68,0,0,0-1.09,8.17l.56,1a6.62,6.62,0,0,0,4.09,3,6.33,6.33,0,0,0,1.67.22,6.67,6.67,0,0,0,3.38-.93L78,118.83A3.57,3.57,0,0,0,79.22,114l-2.14-3.62-.21-.31-12-20.23a2.28,2.28,0,0,1-.25-1.73,2.32,2.32,0,0,1,1.06-1.41,2.3,2.3,0,0,1,3.13.81L80.76,107.6c.08.16.16.32.25.48l2.15,3.62a3.55,3.55,0,0,0,3.07,1.74A3.62,3.62,0,0,0,88,113h0l11.48-6.81A6.69,6.69,0,0,0,101.86,97l-.56-.94a6.68,6.68,0,0,0-7.68-3L78.08,66.86l4-2.39a7.14,7.14,0,0,0,3.43.9,7,7,0,0,0,5.63-11.2l-2.86-3.89h0A52.45,52.45,0,0,0,73.43,36l0,0L69,28.47a12,12,0,0,0,5.09-.78c.62-.21,1.23-.45,1.84-.69a18.24,18.24,0,0,1,4.4-1.32,8.61,8.61,0,0,1,5.58,1.21,18.17,18.17,0,0,1,2.48,1.94,13.59,13.59,0,0,0,4.46,2.94,7.44,7.44,0,0,0,2.31.37c3.79,0,7.46-2.88,9.46-6.27.36-.63.71-1.29,1.06-1.95,1.29-2.43,2.5-4.73,4.72-5.47a9.65,9.65,0,0,1,3.48-.25c.57,0,1.13.05,1.7,0,2.73,0,4.79-1.18,5.51-3a1,1,0,0,0-1.86-.72c-.49,1.26-2.23,1.74-3.69,1.76-.52,0-1,0-1.57,0a11.21,11.21,0,0,0-4.21.34c-3,1-4.5,3.89-5.85,6.44-.33.63-.66,1.26-1,1.86-2,3.39-5.86,6.2-9.4,5a11.69,11.69,0,0,1-3.78-2.55,20.82,20.82,0,0,0-2.75-2.14,10.78,10.78,0,0,0-6.88-1.49,19.75,19.75,0,0,0-4.87,1.45c-.59.23-1.18.46-1.78.66-2.46.86-4.38.94-5.86.26h0l-4-6.69c-4.43-7.47-11.34-5.75-13.83-4.81-.27-.56-.54-1.12-.86-1.66A23.35,23.35,0,0,0,18.22,4,23.13,23.13,0,0,0,9,36.32c.43.71.89,1.4,1.38,2.06A17.74,17.74,0,0,0,7.3,42.19ZM33.08,83,24,87.44A51,51,0,0,1,19.5,72l4.2-.42a1,1,0,0,0,.89-1.07,60.2,60.2,0,0,1,.31-10.4,1,1,0,0,0-.24-.79,1,1,0,0,0-.75-.33H19.75a52.67,52.67,0,0,1,1.59-6.92c1.95,1,7.08,4.26,7.19,13C28.6,70.87,32,80.13,33.08,83ZM19.48,61h3.31a62.37,62.37,0,0,0-.25,8.69L19.31,70A46.92,46.92,0,0,1,19.48,61Zm16,30.77a5,5,0,0,1-2.61,2.82,5,5,0,0,1-6.65-2.46l-1.34-2.91,9-4.39,1.43,3.11A5,5,0,0,1,35.51,91.76Zm2.07-3.55a6.82,6.82,0,0,0-.4-1.12L35.32,83a1,1,0,0,0-.19-.26,87.45,87.45,0,0,1-4.22-14.13L41.23,86.05ZM77,117.11h0l-11.48,6.8a4.69,4.69,0,0,1-6.4-1.64l-.56-1a4.63,4.63,0,0,1,1.14-6l.05,0s.06-.06.09-.09.23-.18.36-.26L69,109.71a4.64,4.64,0,0,1,2.36-.65,4.77,4.77,0,0,1,1.18.15,4.63,4.63,0,0,1,2.74,2l1.21,2a.76.76,0,0,0,.08.11l1,1.63A1.56,1.56,0,0,1,77,117.11Zm-9-32.64a4.29,4.29,0,0,0-4.76,6.34l3.4,5.75-7.92,4.69a1,1,0,0,0-.35,1.37,1,1,0,0,0,.86.49,1,1,0,0,0,.51-.14l7.92-4.69,5.32,9a6.6,6.6,0,0,0-5,.73l-8.44,5L30.61,64.2a1.5,1.5,0,0,0-.11-.13,16.58,16.58,0,0,0-4.62-11.15A13.93,13.93,0,0,0,22,50.16l.23-.65a6.87,6.87,0,0,1,1.71-2.67l6.4-2.09a39.49,39.49,0,0,0,14.22-8.19L50.74,31a28.57,28.57,0,0,1,3.48.23,13.76,13.76,0,0,0,.54,4.61c.82,2.82,2.94,6.82,8.4,9.91l.19.07a.75.75,0,0,0,.08.24L91.8,93.94l-8.45,5a6.59,6.59,0,0,0-3,4l-4-6.67,7.82-4.63a1,1,0,0,0-1-1.73l-7.81,4.63-2.51-4.23,4-2.39a1,1,0,1,0-1-1.72l-4,2.39-1.28-2.15A4.21,4.21,0,0,0,67.93,84.47ZM95.55,94.8a4.67,4.67,0,0,1,4,2.28l.56,1a4.68,4.68,0,0,1-1.64,6.39L87,111.22a1.56,1.56,0,0,1-2.14-.54l-2.11-3.56a.56.56,0,0,0,0-.12l-.11-.18a4.66,4.66,0,0,1,1.75-6.15l8.81-5.22A4.68,4.68,0,0,1,95.55,94.8ZM67.25,48.56a105.4,105.4,0,0,1,9.66,9.9l3,4.08a7.49,7.49,0,0,0,.51.61l-3.36,2ZM90.5,59.08a5,5,0,0,1-9,2.27L79.1,58.07l8.19-5.81,2.28,3.1A4.94,4.94,0,0,1,90.5,59.08Zm-4.39-8.44L77.86,56.5c-2-2.32-8.56-9.64-13.52-12.61a1,1,0,0,0-.56-.12c-7.19-4.24-7.68-10.09-7.58-12.28a44.09,44.09,0,0,1,8.47,2.37l-2,3.65a1,1,0,0,0,1.76,1l2.08-3.84,1.28.6L66.64,37a1,1,0,0,0,.3,1.38,1,1,0,0,0,.54.16,1,1,0,0,0,.84-.46l1.29-2A49.3,49.3,0,0,1,86.11,50.64ZM61.86,20.39,69.93,34a46.36,46.36,0,0,0-6.53-2.79A41.5,41.5,0,0,0,51.57,29a22.9,22.9,0,0,0-1-12.6C52.57,15.6,58.18,14.18,61.86,20.39ZM8.59,18.75A20.94,20.94,0,0,1,19.15,5.8a20.58,20.58,0,0,1,9.59-2.34A21.33,21.33,0,0,1,47.16,13.91a21,21,0,0,1,2.29,15.54l-6.27,5.62a37.69,37.69,0,0,1-13.51,7.78l-6.32,2.06A21.11,21.11,0,0,1,8.59,18.75Zm13,27.69a8.76,8.76,0,0,0-1.29,2.4A54.48,54.48,0,0,0,17.6,60s0,0,0,0h0a48.81,48.81,0,0,0-.43,6.37L8.62,51.94c-3.08-5.46,1.26-10.35,3-12A22.9,22.9,0,0,0,21.59,46.44Z"/><path d="M108.36,81.24a1,1,0,0,0,1-.7,10.6,10.6,0,0,1,7-7,1,1,0,0,0,.7-1,1,1,0,0,0-.7-1,10.64,10.64,0,0,1-7-7,1,1,0,0,0-1-.71,1,1,0,0,0-1,.71,10.66,10.66,0,0,1-7,7,1,1,0,0,0-.71,1,1,1,0,0,0,.71,1,10.62,10.62,0,0,1,7,7A1,1,0,0,0,108.36,81.24Zm-5.11-8.69a12.64,12.64,0,0,0,5.11-5.11,12.66,12.66,0,0,0,5.12,5.11,12.62,12.62,0,0,0-5.12,5.12A12.6,12.6,0,0,0,103.25,72.55Z"/><path d="M117.86,50.2a1,1,0,0,0-1-.71,1,1,0,0,0-1,.71,5.88,5.88,0,0,1-3.88,3.88,1,1,0,0,0-.7,1,1,1,0,0,0,.7,1A5.84,5.84,0,0,1,116,59.87a1,1,0,0,0,1,.71,1,1,0,0,0,1-.71A5.88,5.88,0,0,1,121.75,56a1,1,0,0,0,.7-1,1,1,0,0,0-.7-1A5.9,5.9,0,0,1,117.86,50.2Zm-1,7.06A8,8,0,0,0,114.68,55a7.86,7.86,0,0,0,2.23-2.22A7.82,7.82,0,0,0,119.13,55,8,8,0,0,0,116.91,57.26Z"/><path d="M15.27,117.28a1,1,0,0,0,1.91,0,5.52,5.52,0,0,1,3.64-3.64,1,1,0,0,0,.71-1,1,1,0,0,0-.71-1,5.5,5.5,0,0,1-3.64-3.64,1,1,0,0,0-1.91,0,5.5,5.5,0,0,1-3.64,3.64,1,1,0,0,0-.71,1,1,1,0,0,0,.71,1A5.52,5.52,0,0,1,15.27,117.28Zm1-6.6a7.39,7.39,0,0,0,2,2,7.26,7.26,0,0,0-2,2,7.43,7.43,0,0,0-2-2A7.57,7.57,0,0,0,16.23,110.68Z"/></svg>
                    </div>
                @endforelse
        </div>

        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                <div class="flex items-center gap-4">
                    <a class="inline-flex ml-4">
                        <svg class="mr-1" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="25px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="0.00064">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <path fill="#f7472b" d="M58.714,29.977c0,0-0.612,0.75-1.823,1.961S33.414,55.414,33.414,55.414C33.023,55.805,32.512,56,32,56 s-1.023-0.195-1.414-0.586c0,0-22.266-22.266-23.477-23.477s-1.823-1.961-1.823-1.961C3.245,27.545,2,24.424,2,21 C2,13.268,8.268,7,16,7c3.866,0,7.366,1.566,9.899,4.101l0.009-0.009l4.678,4.677c0.781,0.781,2.047,0.781,2.828,0l4.678-4.677 l0.009,0.009C40.634,8.566,44.134,7,48,7c7.732,0,14,6.268,14,14C62,24.424,60.755,27.545,58.714,29.977z"></path>
                                                        <path fill="#f7472b" d="M58.714,29.977c0,0-0.612,0.75-1.823,1.961S33.414,55.414,33.414,55.414C33.023,55.805,32.512,56,32,56 s-1.023-0.195-1.414-0.586c0,0-22.266-22.266-23.477-23.477s-1.823-1.961-1.823-1.961C3.245,27.545,2,24.424,2,21 C2,13.268,8.268,7,16,7c3.866,0,7.366,1.566,9.899,4.101l0.009-0.009l4.678,4.677c0.781,0.781,2.047,0.781,2.828,0l4.678-4.677 l0.009,0.009C40.634,8.566,44.134,7,48,7c7.732,0,14,6.268,14,14C62,24.424,60.755,27.545,58.714,29.977z"></path>
                                                        <g>
                                                            <path fill="#394240" d="M48,5c-4.418,0-8.418,1.791-11.313,4.687l-3.979,3.961c-0.391,0.391-1.023,0.391-1.414,0 c0,0-3.971-3.97-3.979-3.961C24.418,6.791,20.418,5,16,5C7.163,5,0,12.163,0,21c0,3.338,1.024,6.436,2.773,9 c0,0,0.734,1.164,1.602,2.031s24.797,24.797,24.797,24.797C29.953,57.609,30.977,58,32,58s2.047-0.391,2.828-1.172 c0,0,23.93-23.93,24.797-24.797S61.227,30,61.227,30C62.976,27.436,64,24.338,64,21C64,12.163,56.837,5,48,5z M58.714,29.977 c0,0-0.612,0.75-1.823,1.961S33.414,55.414,33.414,55.414C33.023,55.805,32.512,56,32,56s-1.023-0.195-1.414-0.586 c0,0-22.266-22.266-23.477-23.477s-1.823-1.961-1.823-1.961C3.245,27.545,2,24.424,2,21C2,13.268,8.268,7,16,7 c3.866,0,7.366,1.566,9.899,4.101l0.009-0.009l4.678,4.677c0.781,0.781,2.047,0.781,2.828,0l4.678-4.677l0.009,0.009 C40.634,8.566,44.134,7,48,7c7.732,0,14,6.268,14,14C62,24.424,60.755,27.545,58.714,29.977z"></path>
                                                            <path fill="#394240" d="M48,11c-0.553,0-1,0.447-1,1s0.447,1,1,1c4.418,0,8,3.582,8,8c0,0.553,0.447,1,1,1s1-0.447,1-1 C58,15.478,53.522,11,48,11z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                        </svg>
                        You are visitor: {{$total_visits_to_home_page}}</a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
    </div>
</body>
</html>
