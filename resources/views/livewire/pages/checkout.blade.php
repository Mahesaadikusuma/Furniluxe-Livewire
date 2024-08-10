<div>
    <!-- Product  -->
    <div x-data="{ open: true }" class="container max-w-screen-xl">
        @if (session('error'))
            <div x-show="open" id="alert-1"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Error</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button @click="open = !open" type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-slate-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <section class="body-font overflow-hidden mt-10">
            <div class="container mx-auto px-4">
                <div class="mb-10">
                    <a href="{{ route('home') }}" class="text-xl font-bold text-neutral-800">Back to Home</a>
                </div>

                <div class="grid grid-cols-12">
                    <div class="col-span-12 lg:col-span-8">
                        <div class="flex flex-wrap lg:flex-nowrap lg:flex-row flex-col gap-4">
                            <img src="{{ asset(Storage::url($product->image)) }}" alt=""
                                class="lg:max-w-xs w-full md:max-w-lg rounded-2xl justify-center mx-auto lg:mx-0" />
                            <div>
                                <h1 class="text-xl font-bold text-neutral-800">
                                    {{ $product->name }} ({{ $product->stok }})
                                </h1>

                                <p class="text-gray-500 font-medium text-lg my-5">
                                    <span>IDR {{ number_format($product->price) }}</span>
                                </p>

                                <div class="flex items-center gap-3 text-neutral-800">
                                    <div class="border-2 py-2">
                                        <button wire:click="decrement" class="px-4 py-0 cursor-pointer">-</button>
                                        <input class="max-w-12 text-center border-0" type="text" wire:model="qty"
                                            readonly />
                                        <button wire:click="increment" class="px-4 py-0 cursor-pointer">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-4 border-2 border-gray-200 p-5 rounded-md mt-10 lg:mt-0">
                        <h2 class="text-2xl text-neutral-800 font-bold mb-5">Checkout Information</h2>

                        <div class="text-gray-600">
                            <form wire:submit="proses">
                                <div class="flex justify-between my-3">
                                    <span>Price</span>
                                    <span class="text-orange-500 font-medium">IDR {{ number_format($price) }}</span>
                                </div>

                                <div class="flex justify-between my-3">
                                    <span>Shipping</span>
                                    <span>IDR {{ number_format($shipping) }}</span>
                                </div>

                                <div class="flex justify-between my-3">
                                    <span>Tax</span>
                                    <span>IDR {{ number_format($tax) }}</span>
                                </div>

                                <div class="flex justify-between my-3">
                                    <span>QTY</span>
                                    <span>{{ $qty }}</span>
                                </div>

                                <hr class="border-t-2 my-5" />

                                <div class="flex justify-between my-3">
                                    <span class="font-bold">Total</span>
                                    <span>IDR {{ number_format($total) }}</span>
                                </div>

                                <button type="submit"
                                    class="w-full bg-green-800 text-center my-5 text-white px-4 py-1">
                                    Buy Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
