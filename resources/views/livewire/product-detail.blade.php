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

                <li class="inline-flex items-center">
                    <a wire:navigate href="{{ route('category') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        Categories
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">

                            {{ $detail->name }}
                        </span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Product  -->
    <section class="text-gray-600 body-font overflow-hidden mt-20">
        <div class="container mx-auto px-4">
            <div class="mx-auto flex flex-wrap">
                <div class="lg:w-1/2  w-full   lg:pr-10 lg:py-6 mb-6 lg:mb-0 mt-10 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest mb-3">
                        {{ $detail->category->name }}
                    </h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">
                        {{ $detail->name }}
                    </h1>
                    <div class="flex mb-4">
                        <button wire:click='deskripsi'
                            class="flex-grow text-indigo-500 border-b-2 border-indigo-500 py-2 text-lg px-1">Description</button>
                        <button wire:click='reviews'
                            class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1">Reviews</button>
                    </div>

                    @if ($showDescription)
                        <div>
                            {{--  Fam locavore kickstarter distillery. Mixtape chillwave tumeric
                                sriracha taximy chia microdosing tilde DIY. XOXO fam inxigo
                                juiceramps cornhole raw denim forage brooklyn. Everyday carry +1
                                seitan poutine tumeric. Gastropub blue bottle austin listicle
                                pour-over, neutra jean. --}}
                            <p class="leading-relaxed mb-4">
                                {{ $detail->description }}
                                Fam locavore kickstarter distillery. Mixtape chillwave tumeric
                                sriracha taximy chia microdosing tilde DIY. XOXO fam inxigo
                                juiceramps cornhole raw denim forage brooklyn. Everyday carry +1
                                seitan poutine tumeric. Gastropub blue bottle austin listicle
                                pour-over, neutra jean.
                            </p>

                            <div class="flex border-t border-b mb-6 border-gray-200 py-2">
                                <span class="text-gray-500">Stock</span>
                                <span class="ml-auto text-gray-900">{{ $detail->stok }}</span>
                            </div>
                            <div class="flex">
                                <span class="title-font font-bold text-2xl text-orange-500">{{ $detail->Priced }}</span>
                                @auth
                                    <a wire:navigate href="{{ route('checkout', $detail->slug) }}"
                                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                        Buy Now
                                    </a>
                                @endauth

                                @guest
                                    <a wire:navigate href="{{ route('login') }}"
                                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                        Login
                                    </a>
                                @endguest
                            </div>
                        </div>
                    @endif

                    @if ($showReviews)
                        <div>
                            <p class="leading-relaxed mb-4">
                                Review Produk Anda di sini...
                            </p>
                        </div>
                    @endif


                </div>
                <img alt="ecommerce"
                    class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded order-first lg:order-last"
                    src="{{ asset(Storage::url($detail->image)) }}" />
            </div>


            <!-- Product  -->
            <x-fragment.product>
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
                    @forelse ($products as $item)
                        <div class="w-full card shadow-md object-cover max-h-80 bg-cover">
                            <a wire:navigate href="{{ route('productDetail', $item->slug) }}"
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
                    @empty
                        <div class="text-center ">
                            <p>category product tidak ada</p>
                        </div>
                    @endforelse
                </div>
            </x-fragment.product>
        </div>
    </section>
    <!-- product -->


</div>
