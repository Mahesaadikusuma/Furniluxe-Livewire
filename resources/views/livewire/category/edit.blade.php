<div>
    {{-- <button
        wire:click='delete({{ $category->id }})'wire:confirm="Are you sure you want to delete this category? {{ $category->name }}"
        class="font-medium
        text-blue-600 dark:text-blue-500 hover:underline mx-5">
        Edit {{ $category->name }}
    </button> --}}


    <button wire:click='delete_confirm({{ $category->id }})' data-modal-target="popup-modal"
        data-modal-toggle="popup-modal" class="block text-blue-600  font-medium rounded-lg text-sm text-center "
        type="button">
        Delete {{ $category->name }} {{ $category->id }}
    </button>

    <x-dialog-modal wire:model='showModal'>
        <x-slot name='title'>
            {{ $category->name }}
        </x-slot>

        <x-slot name='content'>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis sapiente rem praesentium, hic beatae, qui
            eaque commodi deleniti dolore quaerat ab delectus quas accusamus architecto doloremque dolorem, similique
            nesciunt recusandae?
            <img src="{{ asset(Storage::url($category->thumbnail)) }}" alt="" class="w-20">
        </x-slot>

        <x-slot name='footer'>
            <button wire:click='delete'>submit</button>
        </x-slot>
    </x-dialog-modal>


    {{-- <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                        delete this Category ? {{ $category->id }}</h3>
                    <button type="submit" wire:click='delete'
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I' m sure </button>
                    <button data-modal-hide="popup-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div> --}}


</div>
