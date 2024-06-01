<div>


    <div class="container mx-auto my-10 px-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a wire:navigate href="{{ route('home') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span
                            class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Categories</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <section class="mt-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-4 gap-y-6">
                <div class="">
                    <a wire:navigate href="{{ route('category') }}"
                        class="px-4 py-1 border-2 border-white rounded-full bg-blue-800 text-white">
                        All
                    </a>
                </div>

                @foreach ($category as $item)
                    <div class="">
                        <x-category.link href="{{ route('category.slug', $item->slug) }}" :slug="$item->slug">
                            {{ $item->name }}
                        </x-category.link>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    <!-- Product  -->
    <x-fragment.product>
        <h1 class=" font-bold text-2xl lg:text-3xl mb-10 text-neutral-800">
            All Product
        </h1>
        <div class="my-5">
            {{-- <input type="text" wire:model.live="search"> --}}
            <form wire:submit.prevent="search">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    {{-- wire:model.live.debounce.lazy="search" --}}
                    <input type="search" id="default-search" wire:model.live="query"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Mockups, Logos..." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
            @foreach ($product as $item)
                <div class="w-full card shadow-md object-cover max-h-80 bg-cover" wire:key="{{ $item->id }}">
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
                            <p class="mt-1 font-medium text-orange-500"> {{ $item->Priced }}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- {{ $product->links() }} --}}

        <div class="">
            {{ $product->links(data: ['scrollTo' => false]) }}

        </div>

    </x-fragment.product>

    <!-- product -->

    @include('includes.footer')
</div>
