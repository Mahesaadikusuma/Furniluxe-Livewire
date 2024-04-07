@section('title')
    HomePage
@endsection

<div class="">
    @include('includes.hero')
    <!-- Choosing Us -->
    <section>
        <div class="container mx-auto p-5 mt-32">
            <div class="grid lg:grid-cols-4 grid-cols-1 lg:place-items-center place-content-center gap-10">
                <div class="">
                    <h1 class="text-second font-bold text-[42px]">
                        Why <br />
                        Choosing Us
                    </h1>
                </div>

                <x-card.feature title="Luxury facilities"
                    body='The advantage of hiring a workspace with us is that givees you
        comfortable service and all-around facilities'
                    link='' />

                <x-card.feature title="Affordable Price"
                    body='You can get a workspace of the highst quality at an affordable
                        price and still enjoy the facilities that are oly here.'
                    link='' />

                <x-card.feature title="Many Choices"
                    body='We provide many unique work space choices so that you can choose
                        the workspace to your liking.'
                    link='' />
            </div>
        </div>
    </section>
    <!-- Choosing Us -->

    <!-- Category Product  -->
    <x-fragment.product title="Category Product">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
            <x-card.category href="{{ route('category') }}" image="{{ asset('assets/image/furniture-1.jpg') }}"
                title='Interior' />

            <x-card.category href="{{ route('category') }}" image="{{ asset('assets/image/furniture-2.jpg') }}"
                title='Kursi' />

            <x-card.category href="{{ route('category') }}" image="{{ asset('assets/image/furniture-3.jpg') }}"
                title='Sofa' />

            <x-card.category href="{{ route('category') }}" image="{{ asset('assets/image/furniture-4.jpg') }}"
                title='Dapur' />
        </div>
    </x-fragment.product>
    <!-- Category product -->

    <!-- Product  -->
    <x-fragment.product title="Product">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
            <x-card.product href="{{ route('detailProduct') }}" image="{{ asset('assets/image/furniture-1.jpg') }}"
                title="The Catalyzer Lorem ipsum dolor sit amet consectetur adipisicing
            elit. lore"
                category='CATEGORY' price='200.000' />

            <x-card.product href="{{ route('detailProduct') }}" image="{{ asset('assets/image/furniture-2.jpg') }}"
                title="The Catalyzer Lorem ipsum dolor sit amet consectetur adipisicing
            elit. lore"
                category='CATEGORY' price='100.000' />

            <x-card.product href="{{ route('detailProduct') }}" image="{{ asset('assets/image/furniture-3.jpg') }}"
                title="The Catalyzer Lorem ipsum dolor sit amet consectetur adipisicing
            elit. lore"
                category='CATEGORY' price='150.000' />

            <x-card.product href="{{ route('detailProduct') }}" image="{{ asset('assets/image/furniture-1.jpg') }}"
                title="The Catalyzer Lorem ipsum dolor sit amet consectetur adipisicing
            elit. lore"
                category='CATEGORY' price='200.000' />
        </div>

        <div class="flex items-center justify-center mt-10">
            <a
                class="flex items-center gap-2 px-5 py-2 rounded-full cursor-pointer border-2 border-slate-800 hover:border-0 hover:bg-slate-600 hover:text-white text-neutral-950">Load
                More
                <i data-feather="arrow-right"></i>
            </a>
        </div>
    </x-fragment.product>
    <!-- product -->

    <section>
        <div class="container mx-auto">
            <div class="grid lg:grid-cols-2 grid-cols-1 place-items-center">
                <div class="mt-5 lg:mt-0 px-5 lg:px-0">
                    <h1 class="text-neutral-800 font-bold lg:text-5xl text-3xl mb-5">
                        Exquisite Materials for Crafting Exceptional Furniture
                    </h1>
                    <p class="text-slate-700 font-light text-lg text-justify">
                        Explore our carefully selected materials known for their
                        durability, strength, and exquisite beauty. With these materials,
                        you can create long-lasting, elegant, and highly valuable
                        furniture. Explore our collection of premium materials and start
                        crafting impressive furniture today
                    </p>
                </div>

                <div class="order-first lg:order-last">
                    <img class="lg:max-w-lg max-w-md" src="{{ asset('assets/image/material.png') }}"
                        alt="crafting Furniture" />
                </div>
            </div>
        </div>
    </section>


    
</div>
