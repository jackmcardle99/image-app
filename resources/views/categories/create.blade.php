<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="pb-8">
                @if ($errors->any())
                    <x-alert>Something went Wrong...</x-alert>
                @endif
            </div>
            <div class="my-6 p-6 bg-white border-b dark:border-gray-600 border-gray-200 shadow-sm sm:rounded-lg dark:bg-slate-700">
                <form action="{{route('categories.store')}}" method="post">
                    @csrf

                    <x-input-label class="font-semibold text-xl ml-1">Topic Name</x-input-label>
                    <x-text-input name="topic"
                            field="topic"
                            class="w-full"
                            autocomplete="off"
                            value="{{@old('topic')}}"></x-input>

                    <br>
                    <x-save-button class="mt-5">Create</x-save-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
