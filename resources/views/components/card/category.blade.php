<a href="{{ $href }}" wire:navigate
    class="hover:scale-100 transition duration-200 ease-out mx-auto card w-full bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="object-cover overflow-hidden w-full p-2">
        <img class="rounded-t-lg w-full h-56 object-cover bg-center"
            src="{{ $image ? $image : asset('assets/image/furniture-1.jpg') }}" alt="{{ $title }}" width="500"
            height="500" loading="lazy" />

    </div>
    <div class="p-4">
        <div class="text-center">
            <h1 class="text-lg font-medium tracking-tight text-gray-800 dark:text-white">
                {{ $title }}
            </h1>
        </div>
    </div>
</a>
