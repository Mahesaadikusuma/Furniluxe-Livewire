<div>
    <div class="container max-w-screen-xl px-4 lg:px-0 my-10 ">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a wire:navigate href="{{ route('home') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-5 h-5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
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

        <div class="flex flex-wrap gap-3 my-5 items-center">
            <a wire:navigate href="{{ route('categories') }}"
                class="px-4 py-1 border-2 border-white rounded-full bg-blue-800 text-white">
                All
            </a>

            @foreach ($categories as $item)
                <a wire:navigate href="{{ route('category.slug', $item->slug) }}"
                    class="px-4 py-1 border-2 border-slate-800 rounded-full hover:bg-blue-800 hover:border-0 hover:text-white text-slate-800 focus:ring-2">
                    {{ $item->name }}
                </a>
            @endforeach
        </div>

        <div class="">
            <h1 class="text-3xl font-bold my-5">Products</h1>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
                @forelse ($products as $item)
                    <div class="w-full card shadow-md object-cover h-full bg-cover">

                        <a wire:navigate href="{{ route('product.detail', $item->slug) }}"
                            class="block relative rounded overflow-hidden cursor-pointer">
                            <img alt="ecommerce" class="object-cover bg-cover w-full h-44 block"
                                src="{{ asset(Storage::url($item->image)) }}" />
                        </a>
                        <div class="my-2 p-2 ">
                            <h2 class="text-gray-500 text-xs tracking-widest title-font mb-2">
                                {{ $item->category->name }}
                            </h2>
                            <h3 class="text-gray-900 title-font text-base font-bold">
                                {{ Str::limit($item->name, 50, '...') }}
                            </h3>
                            <div class="  mt-3">
                                <p class="mt-1 font-medium text-orange-500">{{ $item->Priced }}</p>
                                <p>{{ Str::limit($item->description, 100, '...') }}</p>
                            </div>
                        </div>
                    </div>

                @empty
                    <p class="text-2xl font-semibold text-gray-800">No Products</p>
                @endforelse
            </div>

            <div class="my-5">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
