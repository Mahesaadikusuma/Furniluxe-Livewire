<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @hasrole('Administrator')
                {{ __('Dashboard Admin') }}
            @else
                {{ __('Dashboard') }}
            @endhasrole
        </h2>

        <a wire:navigate href="/telescope/requests" class="bg-blue-500  text-white px-3 text-center py-1">Telescope</a>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h1 class="text-3xl font-bold mb-6 text-center">Produk Populer</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($popularProductsDetails as $product)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                            <img class="w-full h-48 object-cover" src="{{ Storage::url($product->image) }}"
                                alt="{{ $product->name }}">

                            <div class="p-4">
                                <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                                <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 100, '...') }}</p>
                                <p class="text-gray-800 font-bold text-lg mb-4">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}</p>

                                <a href=""
                                    class="block w-full bg-blue-500 text-white text-center py-2 rounded-lg hover:bg-blue-600">
                                    Lihat Produk
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>



            </div>
        </div>
    </div>
</div>
