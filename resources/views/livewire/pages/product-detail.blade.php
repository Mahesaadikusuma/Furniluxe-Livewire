<!-- resources/views/livewire/pages/product-detailProduct.blade.php -->

<div wire:poll>
    <div class="container max-w-screen-xl my-10 px-4">
        <nav class="flex" aria-label="Breadcrumb">
            <!-- Breadcrumb navigation -->
        </nav>

        <section class="text-gray-600 body-font overflow-hidden mt-20">
            <div class="container mx-auto px-4">
                <div class="mx-auto flex flex-wrap">
                    <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0 mt-10 lg:mt-0">
                        <h2 class="text-sm title-font text-gray-500 tracking-widest mb-3">
                            {{ $detailProduct->category->name }}
                        </h2>
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">
                            {{ $detailProduct->name }}
                        </h1>
                        <div class="flex mb-4">
                            <button wire:click="deskripsi"
                                class="flex-grow py-2 text-lg px-1 {{ $showDescription ? 'text-indigo-500 border-b-2 border-indigo-500' : 'border-b-2 border-gray-300' }}">
                                Description
                            </button>
                            <button wire:click="reviews"
                                class="flex-grow py-2 text-lg px-1 {{ $showReviews ? 'text-indigo-500 border-b-2 border-indigo-500' : 'border-b-2 border-gray-300' }}">
                                Reviews ({{ $ReviewProduct->count() }})
                            </button>
                        </div>

                        @if ($showDescription)
                            <div>
                                <p class="leading-relaxed mb-4">
                                    {{ $detailProduct->description }}
                                </p>

                                <div class="flex border-t border-b mb-6 border-gray-200 py-2">
                                    <span class="text-gray-500">Stock</span>
                                    <span class="ml-auto text-gray-900">{{ $detailProduct->stok }}</span>
                                </div>
                                <div class="flex items-center justify-between gap-3">
                                    <span
                                        class="title-font font-bold text-2xl text-orange-500">{{ $detailProduct->Priced }}</span>
                                    @auth


                                        {{-- {{ route('checkout', $detailProduct->slug) }} --}}
                                        <div class="flex justify-end  gap-5 ">
                                            <Button wire:click='addCart({{ $detailProduct->id }})'
                                                class="hover:text-orange-500 hover:bg-slate-100 px-5 font-semibold">
                                                Cart
                                            </Button>

                                            <a wire:navigate href="{{ route('checkout', $detailProduct->slug) }}"
                                                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                                Buy Now
                                            </a>
                                        </div>


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
                            @forelse ($ReviewProduct as $item)
                                <article class="my-2">
                                    <div class="flex items-center ">
                                        <div class="font-medium dark:text-white">
                                            {{ $item->user->name }}
                                        </div>
                                    </div>

                                    <footer class="my-2 text-sm text-gray-500 dark:text-gray-400">
                                        <p>
                                            {{ $item->created_at->diffForHumans() }}
                                        </p>
                                    </footer>
                                    <p class=" text-gray-500 dark:text-gray-400">
                                        {{ Str::title(Str::limit($item->comment, 100, '...')) }}
                                    </p>
                                </article>
                                <hr class="border-1 border-slate-200">
                            @empty
                                <p>No Reviews</p>
                            @endforelse
                            @if ($detailProduct->Reviews->count() >= 1)
                                {{-- <button class="text-center bg-red-500">
                                    Read More
                                </button> --}}
                                <div wire:ignore class=" my-2">
                                    {{-- <button class="hover:underline">Read More</button> --}}
                                    <livewire:pages.productreviews :product="$detailProduct" :id="$detailProduct->id" :slug="$detailProduct->slug"
                                        :key="$detailProduct->id">
                                </div>
                            @endif
                        @endif



                    </div>
                    <img alt="ecommerce"
                        class="lg:w-1/2 h-full object-cover object-center rounded order-first lg:order-last"
                        src="{{ asset(Storage::url($detailProduct->image)) }}" />
                </div>

                <!-- Produk lainnya -->
                <x-fragment.product>
                    <h2 class="text-2xl font-bold text-gray-800 my-5">Explore Products</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
                        @foreach ($products as $item)
                            <div class="w-full card shadow-md object-cover max-h-80 bg-cover">
                                <a wire:navigate href="{{ route('product.detail', $item->slug) }}"
                                    class="block relative rounded overflow-hidden cursor-pointer">
                                    <img alt="ecommerce" class="object-cover bg-cover w-full h-44 block"
                                        src="{{ asset(Storage::url($item->image)) }}" />
                                </a>
                                <div class="my-2 p-2">
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
                </x-fragment.product>
            </div>
        </section>
    </div>
</div>
