@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-500 focus:border-indigo-500 text-black dark:text-slate-200 focus:ring-indigo-500 rounded-md bg-gray-100 dark:bg-gray-600 shadow-sm']) !!}>
