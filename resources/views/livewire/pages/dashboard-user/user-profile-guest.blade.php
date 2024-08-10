<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile User') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-form-section submit="updateProfileInformation">
                <x-slot name="title">
                    {{ __('Profile Information') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Update your account\'s profile information and email address.') }}

                </x-slot>

                <x-slot name="form">
                    <!-- Profile Photo -->



                    <div class="col-span-6 sm:col-span-4">
                        @if ($this->user->profile_photo_path)
                            <div class="w-44 md:w-32  ">
                                <img src="{{ Storage::url($this->user->profile_photo_path) }}"
                                    alt="{{ $this->user->name }}" class="mb-4 rounded-md">
                            </div>
                        @endif
                        <label for="photo" class="block text-sm font-medium text-gray-700">
                            Photo
                        </label>
                        <input wire:model.lazy="photo" type="file" id="photo"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <x-input-error for="photo" class="mt-2" />
                    </div>

                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Name
                        </label>
                        <input wire:model.lazy="name" type="text" id="name"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="col-span-6 sm:col-span-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <input wire:model.lazy="email" type="email" id="email"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <x-input-error for="email" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-button type="submit">
                        Save
                    </x-button>
                </x-slot>
            </x-form-section>
        </div>
    </div>
</div>
