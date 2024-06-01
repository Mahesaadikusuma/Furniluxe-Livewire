<div>

    <!-- Hero -->
    <x-hero.header>
        <h1 class="font-bold lg:text-5xl sm:text-4xl text-2xl mb-10 hidden lg:block">
            Elevate the look of your interior with <br>
            captivating minimalistic touches and <br>
            modern style
        </h1>

        <h1 class="font-bold lg:text-5xl sm:text-4xl text-2xl mb-10 block  md:hidden">
            Elevate the look of your interior with
            captivating minimalistic touches and
            modern style
        </h1>

        <p class="lg:text-xl sm:text-lg text-base mb-11 hidden lg:block">
            you can effortlessly and quickly transform your room <br>
            into a minimalist and modern space, creating a fresh <br>
            and stylish atmosphere
        </p>


        <p class="lg:text-xl sm:text-lg text-base mb-11 block  md:hidden">
            you can effortlessly and quickly transform your room
            into a minimalist and modern space, creating a fresh
            and stylish atmosphere
        </p>

        <a href="#" class="px-7 py-2   rounded-lg  bg-neutral-800 text-white hover:border-2 hover:border-white">
            Shop Now
        </a>
    </x-hero.header>
    <!-- Hero -->

    @include('includes.choosing')

    <!-- Category Product  -->
    <x-fragment.category>
        <h1 class="text-center font-bold text-xl lg:text-2xl mb-16 text-neutral-800">
            Category Product
        </h1>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
            @foreach ($category as $item)
                <x-category.product>
                    <a wire:navigate href="{{ route('category') }}"
                        class="block relative rounded overflow-hidden cursor-pointer">
                        <img alt="ecommerce" class="object-cover bg-cover w-full h-56 block"
                            src="{{ asset('assets/image/furniture-3.jpg') }}" />
                    </a>

                    <div class="my-5 pb-5">
                        <a href="#" class="text-center">
                            <h2 class="text-lg font-medium tracking-tight text-gray-800 dark:text-white">
                                {{ $item->name }}
                            </h2>
                        </a>
                    </div>
                </x-category.product>
            @endforeach
        </div>

    </x-fragment.category>
    <!-- Category product -->

    <!-- Product  -->
    <x-fragment.product>
        <h1 class="text-center font-bold text-2xl lg:text-3xl mb-16 text-neutral-800">
            Product
        </h1>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
            @foreach ($product as $item)
                <div class="w-full card shadow-md object-cover max-h-80 bg-cover">
                    <a href="{{ route('productDetail', $item->slug) }}"
                        class="block relative rounded overflow-hidden cursor-pointer">
                        <img alt="ecommerce" class="object-cover bg-cover w-full h-44 block"
                            src="{{ asset(Storage::url($item->image)) }}" />
                    </a>
                    <div class="my-2 p-2 ">
                        <h2 class="text-gray-500 text-xs tracking-widest title-font mb-2">
                            {{ $item->category->name }}
                        </h2>
                        <h3 class="text-gray-900 title-font text-base font-bold">
                            {{ $item->name }}
                        </h3>
                        <div class="flex items-center justify-between mt-3">
                            <p class="mt-1 font-medium text-orange-500">{{ $item->Priced }}</p>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="flex items-center justify-center mt-10">
            <a href="{{ route('category') }}" wire:navigate
                class="flex items-center gap-2 px-5 py-1 rounded-full cursor-pointer border-2 border-slate-800 hover:border-0 hover:bg-slate-600 hover:text-white text-neutral-950">Load
                More
                <i data-feather="arrow-right"></i>
            </a>
        </div>
    </x-fragment.product>
    <!-- product -->

    @include('includes.feature')

</div>
