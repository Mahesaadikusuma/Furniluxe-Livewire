<div class="">

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
                        Username
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>

                    <th scope="col" class="px-6 py-3">
                        QTY
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Code
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Created
                    </th>

                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaction as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" wire:key="{{ $item->id }}">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>

                        <td class="px-6 py-4">
                            {{ $item->user->name }}

                        </td>

                        <td class="px-6 py-4">
                            @foreach ($item->product as $product)
                                {{ $product->name }}
                            @endforeach
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->qty }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->code }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->transaction_status }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->TotalPriced }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->Created }}
                        </td>

                        <td class="px-6 py-4  flex">
                            {{-- @livewire('product.product-edit', ['product' => $item], key($item->id)) --}}
                            <livewire:transaction.transaction-edit :transaction="$item" wire:key='{{ $item->id }}' />

                        </td>

                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>

        <div class="p-5">
            {{ $transaction->links() }}
        </div>
    </div>
</div>
