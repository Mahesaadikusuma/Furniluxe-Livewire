<div class="">
    <!-- Product  -->
    <section class="body-font overflow-hidden mt-10">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-12">
                <div class="col-span-12 lg:col-span-8">
                    <div class="flex flex-wrap lg:flex-nowrap lg:flex-row flex-col gap-4">
                        <img src="{{ asset('assets/image/furniture-1.jpg') }}" alt=""
                            class="lg:max-w-xs w-full md:max-w-lg rounded-2xl justify-center mx-auto lg:mx-0" />
                        <div class="">
                            <h1 class="text-xl font-bold text-neutral-800">
                                Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit.
                            </h1>

                            <p class="text-gray-500 font-medium text-lg my-5">
                                {{-- @if ($this->qty <= 1)
                                    <span>IDR {{ number_format($price) }}</span>
                                @endif

                                @if ($this->qty > 1)
                                    <span>IDR {{ number_format($price) }}</span>
                                @endif --}}


                                @if ($this->qty <= 1)
                                    <span>IDR {{ number_format($price) }}</span>
                                @else
                                    <span>IDR {{ number_format($price) }}</span>
                                @endif
                            </p>

                            <div class="flex items-center gap-3 text-neutral-800">
                                <div class="border-2 py-2">
                                    <button wire:click="decrement" class="px-4 py-0 cursor-pointer">
                                        -
                                    </button>

                                    <input class="max-w-12 text-center border-0" type="text"
                                        value={{ $qty }} readonly />

                                    <button wire:click="increment" class="px-4 py-0 cursor-pointer">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-4 border-2 border-gray-200 p-5 rounded-md mt-10 lg:mt-0">
                    <h2 class="text-2xl text-neutral-800 font-bold mb-5">
                        Checkout Information
                    </h2>

                    <div class="text-gray-600">
                        <div class="flex justify-between my-3">
                            <span>Price</span>

                            @if ($this->qty <= 1)
                                <span class="text-orange-500 font-medium">IDR {{ number_format($price) }}</span>
                            @endif

                            @if ($this->qty > 1)
                                <span class="text-orange-500 font-medium">IDR {{ number_format($price) }}</span>
                            @endif


                        </div>

                        <div class="flex justify-between my-3">
                            <span>Shipping</span>
                            <span>IDR. {{ number_format($shipping) }}</span>
                        </div>

                        <div class="flex justify-between my-3">
                            <span>Tax</span>
                            <span>IDR. {{ number_format($tax) }}</span>
                        </div>

                        <div class="flex justify-between my-3">
                            <span>QTY</span>
                            <span> {{ $this->qty }}</span>
                        </div>
                        <hr class="border-t-2 my-5" />

                        <!-- <div class="">
                            <input
                            type="text"
                            placeholder="kupon Diskon"
                            class="w-full border-2 p-1" />
                        </div> -->

                        <div class="flex justify-between my-3">
                            <span class="font-bold">Total</span>
                            <span class="">IDR {{ number_format($total) }} </span>
                        </div>

                        <div class="w-full bg-green-800 text-center my-5">
                            <a class="block text-white px-4 py-1">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product -->


</div>
