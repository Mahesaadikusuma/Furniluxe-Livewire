@props(['slug', 'active'])




@php
    $searchQuery = request()->query('search'); // Mendapatkan query pencarian dari URL
    $currentSlug = request()->segment(2);
    $isActive = $slug === $currentSlug; // Memeriksa apakah ada parameter pencarian dalam URL

    $classes = $isActive
        ? 'px-4 py-1 border-2 border-white rounded-full bg-blue-800 text-white'
        : 'px-4 py-1 border-2 border-slate-800 rounded-full hover:bg-blue-800 hover:border-0 hover:text-white text-slate-800 focus:ring-2';
@endphp



<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
