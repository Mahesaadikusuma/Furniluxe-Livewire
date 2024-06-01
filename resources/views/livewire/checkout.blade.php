<div>
    <!-- Product  -->
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
                                {{ $product->name }}
                            </h1>

                            <p class="text-gray-500 font-medium text-lg my-5">
                                <span>IDR {{ number_format($price) }}</span>
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
                        <form wire:submit.prevent="proses">
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

                            <button type="submit" class="w-full bg-green-800 text-center my-5 text-white px-4 py-1">
                                Buy Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
