<a href="{{ $href ? $href : '#' }}" wire:navigate class="w-full card shadow-md object-cover max-h-80 bg-cover">
    <div class="block relative rounded overflow-hidden cursor-pointer">
        <img alt="{{ $title }}" class="object-cover bg-cover w-full h-44 block"
            src="{{ $image ? $image : asset('assets/image/furniture-1.jpg') }}" />
    </div>
    <div class="my-2 p-2">
        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-2">

            {{ $category }}
        </h3>
        <h2 class="text-gray-900 title-font text-base font-bold">
            {{ $title }}
        </h2>
        <div class="flex items-center justify-between mt-3">
            <p class="mt-1 font-medium text-orange-500">Rp. {{ $price }}</p>
        </div>
    </div>
</a>
