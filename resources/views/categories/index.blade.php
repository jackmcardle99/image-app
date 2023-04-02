<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="dark:bg-gray-900 flex-auto flex space-x-4 justify-center">
            <button class="h-10 px-6 font-semibold rounded-md bg-teal-400 text-white" type="submit">
                +
                Create category
            </button>
    </div>
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse($categories as $category)
            <div class=" my-6 p-6 bg-white border-b border-gray-200 shadow-sm rounded-md sm:rounded-lg">
                <h2 class="font-bold text-2xl">
                    {{ $category->topic }}
                </h2>
                <br>
            </div>
            @empty
                <p>No categories.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
