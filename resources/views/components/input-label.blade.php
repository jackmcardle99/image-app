@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm dark:text-slate-200 text-black ']) }}>
    {{ $value ?? $slot }}
</label>
