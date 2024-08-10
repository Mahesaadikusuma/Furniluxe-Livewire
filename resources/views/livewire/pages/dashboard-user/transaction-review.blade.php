<div>
    <button wire:click='modal_confirm' data-modal-target="popup-modal" data-modal-toggle="popup-modal"
        class="font-medium text-green-600 dark:text-green-500 hover:underline " type="button">
        Review
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
                <label for="review_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    message
                </label>
                <textarea id="review_id" name="review_id" rows="4" wire:model.blur='review'
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here...">
                    
                </textarea>
                <div>
                    @error('review')
                        <span class="text-red-500 font-bold">{{ $message }}</span>
                    @enderror
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
