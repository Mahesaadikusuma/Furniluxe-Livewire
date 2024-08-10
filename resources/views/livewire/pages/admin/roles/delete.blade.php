<div>
    <button wire:click="delete_confirm({{ $role->id }})"
        class="font-medium text-red-600
        hover:underline mx-5">
        Delete
    </button>

    <x-confirmation-modal wire:model="showModal">
        <x-slot name="title">

            Delete Role {{ $role->name }} {{ $role->id }}
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete your account? Once your account is deleted, all of its resources and
            data will be permanently deleted.


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
