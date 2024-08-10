<div class="">

    <button wire:click='modal_confirm' data-modal-target="popup-modal" data-modal-toggle="popup-modal"
        class="font-medium text-blue-600 dark:text-blue-500 hover:underline " type="button">
        Edit
    </button>

    <x-modal wire:model="showModal">
        <form wire:submit='update'>
            <div class="p-4 md:p-5 space-y-4">
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Name
                    </label>
                    <input type="text" id="name" name="name" wire:model.blur='name'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Kursi" required />
                    <span class="text-red-500 text-sm">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>


                <div class="mb-5">
                    <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Roles
                    </label>
                    @foreach ($roles as $item)
                        <input type="checkbox" id="role-{{ $item->id }}" name="rolesSelected[]"
                            value="{{ $item->id }}" wire:model="rolesSelected">

                        <label for="role-{{ $item->id }}"> {{ $item->name }} </label>
                    @endforeach



                    {{-- <select id="roles" name="roles" wire:model='selectedRole'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">
                            @foreach ($user->roles as $item)
                                {{ $item->name }}
                            @endforeach
                        </option>

                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select> --}}
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
