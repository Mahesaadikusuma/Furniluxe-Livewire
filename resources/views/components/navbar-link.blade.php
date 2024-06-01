@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'nav-link-active block py-2 px-3 rounded md:p-0 md:dark:text-blue-500'
            : 'block py-2 px-3  text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
