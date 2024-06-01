<div class="">
    <button class="bg-blue-500 text-white px-4 py-1 my-5" wire:click='removeTMP'>Remove Temp</button>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption
                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Our products
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products
                    designed to help you work and play, stay organized, get answers, keep in touch, grow your business,
                    and
                    more.</p>
            </caption>

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slug
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>

                    <th scope="col" class="px-6 py-3">
                        price
                    </th>

                    <th scope="col" class="px-6 py-3">
                        stok
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" wire:key="{{ $item->id }}">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->slug }}
                        </td>
                        <td class="px-6 py-4">

                            @if ($item->image)
                                <img src="{{ asset(Storage::url($item->image)) }}" alt="{{ $item->name }}"
                                    class="w-20">
                            @else
                                <span>gambar belum diupload</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->category->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->Priced }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->stok }}
                        </td>

                        <td class="px-6 py-4  flex">
                            {{-- @livewire('product.product-edit', ['product' => $item], key($item->id)) --}}
                            <livewire:product.product-edit :product="$item" wire:key='{{ $item->id }}' />
                            <livewire:product.product-delete :product="$item" wire:key='{{ $item->id }}' />
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Data tidak ada</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
