@section('title')
    Categories
@endsection



<div>
    <!-- BreadCume -->
    <section>
        <div class="container mx-auto mt-5 px-4">
            <div class="flex items-center">
                <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-2 cursor-pointer">
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

    <section class="mt-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-4 gap-y-6">
                <x-category.categoryLink href='' title='Kursi' active='true' />
                <x-category.categoryLink href='' title='Meja' />
                <x-category.categoryLink href='' title='Sofa' />
                <x-category.categoryLink href='' title='Meja Belajar' />
                <x-category.categoryLink href='' title='Interior' />
            </div>
        </div>
    </section>

    <!-- Product  -->

    <!-- product -->
    <x-fragment.category.product>
        <x-card.product href="{{ route('detailProduct') }}" image="{{ asset('assets/image/furniture-4.jpg') }}"
            title="The Catalyzer Lorem ipsum dolor sit amet consectetur adipisicing
            elit. lore"
            category='CATEGORY' price='200.000' />


    </x-fragment.category.product>
</div>
