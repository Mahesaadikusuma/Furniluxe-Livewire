@props(['active'])
@php
    $classes =
        $active ?? false
            ? 'px-4 py-1 border-2 border-white rounded-full bg-blue-800  text-white'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300  focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<section class="mt-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap gap-4 gap-y-6">
            <div {{ $attributes->merge(['class' => $classes]) }}>
                <a href=" {{ $href ? $href : '#' }}" wire:navigate class=""> {{ $title }}
                </a>
            </div>
        </div>
    </div>
</section>
