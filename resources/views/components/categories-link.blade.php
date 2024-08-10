@props(['active', 'href' => ''])

@php
    $classes =
        $active ?? false
            ? 'px-4 py-1 border-2 border-white rounded-full bg-blue-800 text-white'
            : 'px-4 py-1 border-2 border-slate-800 rounded-full hover:bg-blue-800 hover:border-0 hover:text-white text-slate-800 focus:ring-2';
@endphp

<a wire:navigate href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>


{{-- px-4 py-1 border-2 border-white rounded-full bg-blue-800 text-white'
        : 'px-4 py-1 border-2 border-slate-800 rounded-full hover:bg-blue-800 hover:border-0 hover:text-white text-slate-800 focus:ring-2 --}}
