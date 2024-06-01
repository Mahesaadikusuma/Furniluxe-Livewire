<div>

    <button wire:click='delete_confirm({{ $category->id }})' data-modal-target="popup-modal"
        data-modal-toggle="popup-modal" class="block text-red-600  font-medium rounded-lg text-sm text-center "
        type="button">
        Delete
    </button>



    <x-confirmation-modal wire:model="showModal">
        <x-slot name="title">
            <div
                class="mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </div>
            Delete Category {{ $category->name }}
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete your account? Once your account is deleted, all of its resources and
            data will be permanently deleted.
            @if ($category->thumbnail)
                <img src="{{ asset(Storage::url($category->thumbnail)) }}" alt="{{ $category->slug }}"
                    class="w-1/2 my-5">
            @else
                <span class="text-red-500">Thumbnail belum di upload</span>
            @endif

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showModal')">
                Nevermind
            </x-secondary-button>

            <button wire:click='delete'
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mx-2">submit</button>
        </x-slot>
    </x-confirmation-modal>


</div>
