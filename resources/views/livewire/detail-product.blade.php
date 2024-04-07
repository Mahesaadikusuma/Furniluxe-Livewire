@section('title')
    Detail Product
@endsection

<div>
    <!-- BreadCume -->
    <section>
        <div class="container mx-auto mt-5 px-4">
            <div class="flex items-center">
                <a href="index.html" class="flex items-center gap-2 cursor-pointer">
                    <i data-feather="arrow-left"></i>
                    Back Home
                </a>
            </div>

            <div class="breadcrumbs">
                <ul class="">
                    <li class="">
                        <a href="index.html">Home</a>
                    </li>

                    <li class="text-neutral-800 font-medium">Category</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- BreadCume -->

    <!-- Product  -->
    <x-fragment.detail-product>
        <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0 mt-10 lg:mt-0">
            <h2 class="text-sm title-font text-gray-500 tracking-widest">
                BRAND NAME
            </h2>
            <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">
                Animated Night Hill Illustrations
            </h1>
            <div class="flex mb-4">
                <a class="flex-grow text-indigo-500 border-b-2 border-indigo-500 py-2 text-lg px-1">Description</a>
                <a class="flex-grow border-b-2 border-gray-300 py-2 text-lg px-1">Reviews</a>
            </div>
            <p class="leading-relaxed mb-4">
                Fam locavore kickstarter distillery. Mixtape chillwave tumeric
                sriracha taximy chia microdosing tilde DIY. XOXO fam inxigo
                juiceramps cornhole raw denim forage brooklyn. Everyday carry +1
                seitan poutine tumeric. Gastropub blue bottle austin listicle
                pour-over, neutra jean.
            </p>

            <div class="flex border-t border-b mb-6 border-gray-200 py-2">
                <span class="text-gray-500">Stock</span>
                <span class="ml-auto text-gray-900">4</span>
            </div>
            <div class="flex">
                <span class="title-font font-bold text-2xl text-orange-500">$58.00</span>
                <a href="{{ route('checkout') }}" wire:navigate
                    class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                    Buy Now
                </a>
            </div>
        </div>
        <img alt="ecommerce"
            class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded order-first lg:order-last"
            src="{{ asset('assets/image/furniture-1.jpg') }}" alt="detail-product" />

    </x-fragment.detail-product>
    <!-- product -->
</div>
