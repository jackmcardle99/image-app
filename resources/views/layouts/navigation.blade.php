<nav x-data="{ open: false }" class="dark:bg-[#141a1c] bg-white border-b border-gray-100 dark:border-slate-600">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center ">
                    <a href="{{ route('posts.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        <p class="dark:text-slate-100">{{ __('Posts') }}</p>
                    </x-nav-link>
                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                        <p class="dark:text-slate-100">{{ __('Categories') }}</p>
                    </x-nav-link>
                    <x-nav-link :href="route('trashed.index')" :active="request()->routeIs('trashed.index')">
                        <p class="dark:text-slate-100">{{ __('Trash') }}</p>
                    </x-nav-link>
                    @can('is_admin')
                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
                        <p class="dark:text-slate-100">{{ __('Admin Panel') }}</p>
                    </x-nav-link>
                    @endcan
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 dark:bg-[#141a1c]">
{{--                <x-primary-button id="dark-mode-toggle" onclick="toggleDarkMode()">Enable Dark Mode</x-primary-button>--}}
                <button type="submit" onclick="toggleDarkMode()" class="mr-3 mt-1" id="dark-mode-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 p-1 text-gray-100 transition bg-gray-700 rounded-full cursor-pointer dark:hover:bg-gray-600"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                    </svg>
                    <span class="sr-only">Toggle dark mode</span>
                </button>

                <script>
                    // function to toggle the dark mode
                    function toggleDarkMode() {
                        const htmlEl = document.documentElement;
                        htmlEl.classList.toggle('dark');
                        const darkModeEnabled = htmlEl.classList.contains('dark');
                        setDarkModeCookie(darkModeEnabled);
                    }

                    // function to set the dark mode cookie
                    function setDarkModeCookie(darkModeEnabled) {
                        const d = new Date();
                        d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000)); // Cookie expires after 1 year
                        const expires = "expires="+ d.toUTCString();
                        document.cookie = "dark_mode_enabled=" + darkModeEnabled + ";" + expires + ";path=/";
                    }

                    // function to get the dark mode cookie
                    function getDarkModeCookie() {
                        const name = "dark_mode_enabled=";
                        const decodedCookie = decodeURIComponent(document.cookie);
                        const cookies = decodedCookie.split(';');
                        for (let i = 0; i < cookies.length; i++) {
                            let cookie = cookies[i];
                            while (cookie.charAt(0) == ' ') {
                                cookie = cookie.substring(1);
                            }
                            if (cookie.indexOf(name) == 0) {
                                return cookie.substring(name.length, cookie.length) === "true";
                            }
                        }
                        return false;
                    }

                    // set the initial dark mode state based on the cookie
                    const darkModeEnabled = getDarkModeCookie();
                    if (darkModeEnabled) {
                        document.documentElement.classList.add("dark");
                    } else {
                        document.documentElement.classList.remove("dark");
                    }
                </script>

                <x-dropdown align="right" width="48" class="dark:bg-[#141a1c] ">
                    <x-slot name="trigger" class="dark:bg-[#141a1c]">
                        <button class="dark:bg-[#141a1c] inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div><p class="dark:text-slate-200">{{ Auth::user()->name }}</p></div>
                            <div></div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="dark:bg-[#141a1c]">
                        <x-dropdown-link :href="route('profile.edit')" class="dark:bg-[#141a1c] dark:hover:bg-gray-700">
                            <p class="dark:text-slate-200">{{ __('Profile') }}</p>
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" class="dark:bg-[#141a1c] ">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dark:bg-[#141a1c] dark:hover:bg-gray-700">
                                <p class="dark:text-slate-200">{{ __('Log Out') }}</p>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="mr-2 flex items-center sm:hidden dark:bg-[#141a1c]">
                <button @click="open = ! open" class="dark:bg-[#141a1c] inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden  dark:bg-[#141a1c]">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('posts.index')" :active="request()->routeIs('posts')">
                {{ __('Posts') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories')">
                {{ __('Categories') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('trashed.index')" :active="request()->routeIs('trashed')">
                {{ __('Trash') }}
            </x-responsive-nav-link>
            @can('is_admin')
            <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin')">
                {{ __('Admin Panel') }}
            </x-responsive-nav-link>
            @endcan
            <button @click="darkMode = !darkMode" class="ml-3">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 p-1 text-gray-100 transition bg-gray-700 rounded-full cursor-pointer dark:hover:bg-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                </svg>
                <span class="sr-only">light</span>
            </button>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:bg-[#141a1c]">
            <div class="px-4">
               <div class="dark:text-slate-200 font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
               <div class="dark:text-slate-200 font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1 dark:bg-[#141a1c]">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" >
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="dark:bg-[#141a1c]">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
