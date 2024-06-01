<div>
    <button wire:click='modal_confirm({{ $transaction->id }})' data-modal-target="popup-modal"
        data-modal-toggle="popup-modal" class="block   text-blue-600  font-medium rounded-lg text-sm text-center "
        type="button">
        Edit
    </button>

    <x-modal wire:model="showModal">
        <div class="p-5">
            <div class=" flex align-items-center justify-between mb-5">
                <h1 class="font-bold text-lg lg:text-xl  text-neutral-800">Transaction Detail</h1>
                <p class="font-medium text-neutral-300">{{ $transaction->code }}</p>
            </div>

            <div class="mb-5">
                <p>Transaction : {{ $username->name }}</p>
            </div>
            <form>
                <div class="grid grid-cols-2 gap-5">
                    <div class="">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Name
                        </label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $username->name }}" disabled />

                    </div>

                    <div class="">
                        <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Product Name
                        </label>
                        @foreach ($transaction->product as $item)
                            <input type="text" id="product_id" name="product_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $item->name }}" disabled />
                        @endforeach
                    </div>

                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email
                        </label>
                        <input type="text" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $username->email }}" disabled />
                    </div>

                    <div class="">
                        <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Quantity
                        </label>

                        <input type="text" id="qty" name="qty"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $transaction->qty }}" disabled />
                    </div>

                    <div class="">
                        <label for="transaction_status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Status Transaction
                        </label>

                        <input type="text" id="transaction_status" name="transaction_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $transaction->transaction_status }}" />
                    </div>

                    <div class="">
                        <label for="transaction_total"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Shipping
                        </label>



                        <input type="text" id="transaction_total" name="transaction_total"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $transaction->transactionDetail->shipping ?? '0' }}" disabled />

                    </div>

                    <div class="">
                        <label for="transaction_total"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Transaction Total
                        </label>

                        <input type="text" id="transaction_total" name="transaction_total"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $transaction->TotalPriced }}" disabled />
                    </div>
                </div>

                <div class="mt-10">
                    <button type="submit" class="w-full py-2 bg-blue-500 hover:bg-blue-800 text-white">Submit</button>
                </div>


            </form>


        </div>

    </x-modal>
</div>
