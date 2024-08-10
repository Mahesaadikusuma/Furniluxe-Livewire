<div wire:ignore>

    <button wire:click='modal_confirm' data-modal-target="popup-modal" data-modal-toggle="popup-modal"
        class="font-medium text-blue-600 dark:text-blue-500 hover:underline " type="button">
        Edit
    </button>

    <x-modal wire:model="showModal">
        <div class="px-5 mt-5">
            <div class="flex justify-between">
                <p>{{ $transaction->invoice }}</p>
                <p>{{ $transaction->user->name }}</p>
            </div>

            <h1>Product : {{ $transaction->product->name }}</h1>
        </div>


        <form wire:submit='update'>
            <div class="p-4 md:p-5 space-y-4">
                <div class="mb-5">
                    <label for="transaction_status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Transaction Status
                    </label>
                    {{-- <input type="text" id="transactionStatus" name="transactionStatus"
                        wire:model.blur='transactionStatus'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                    <span class="text-red-500 text-sm">
                        @error('transactionStatus')
                            {{ $message }}
                        @enderror
                    </span> --}}


                    <select wire:model.blur='transaction_status' id="transaction_status" name="transaction_status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilihan Status {{ $transaction->transaction_status }}</option>
                        <option value="SUCCESS">SUCCESS</option>
                        <option value="PENDING">PENDING</option>
                        <option value="FAILED">FAILED</option>
                    </select>
                </div>


                <div class="mb-5">
                    <label for="resi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Resi
                    </label>

                    <input type="text" wire:model.blur='resi' id="resi" name="resi"
                        value="{{ $transaction->detail->resi ?? '' }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="px-5 py-1 bg-blue-500 text-white">Submit</button>
                    <button type="button" class="px-5 py-1 bg-gray-100 text-gray-500"
                        wire:click='showModal = false'>Cancel</button>
                </div>
            </div>
        </form>
    </x-modal>
</div>
