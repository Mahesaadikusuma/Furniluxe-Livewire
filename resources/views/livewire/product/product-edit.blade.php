<div>
    <button wire:click='modal_confirm({{ $product->id }})' data-modal-target="popup-modal" data-modal-toggle="popup-modal"
        class="block   text-blue-600  font-medium rounded-lg text-sm text-center " type="button">
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
                        placeholder="Kursi" value="{{ $product->name }}" required />
                    <span class="text-red-500 text-sm">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-5">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Categoy Selected
                    </label>
                    <select id="category_id" name="category_id" wire:model='category_id'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="{{ $product->category_id }}">{{ $product->category->name }}</option>

                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Price
                    </label>
                    <input type="number" id="price" name="price" wire:model.blur='price'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="10000" value="{{ $product->price }}" required />
                    <span class="text-red-500 text-sm">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-5">
                    <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Stok
                    </label>
                    <input type="number" id="stok" stok="stok" wire:model.blur='stok'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Kursi" value="{{ $product->stok }}" required />
                    <span class="text-red-500 text-sm">
                        @error('stok')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                        file
                        <input type="file" wire:model='image'
                            class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-violet-50 file:text-violet-700
                                        hover:file:bg-violet-100 active:border-0" />


                        <div>
                            @error('image')
                                <span class="text-sm text-red-500 italic">{{ $message }}</span>
                            @enderror
                        </div>

                        <div wire:loading wire:target="image">
                            <li class="flex items-center my-4">
                                <div role="status">
                                    <svg aria-hidden="true"
                                        class="w-4 h-4 me-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="currentColor" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentFill" />
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Preparing Upload your image
                            </li>
                        </div>
                        @if ($product->image)
                            <span>Old Image</span>
                            <img src="{{ asset(Storage::url($product->image)) }}" alt="{{ $product->slug }}"
                                class="w-1/4 my-2 ">
                        @endif

                        @if ($image)
                            <span>New Image</span>
                            <img src="{{ $image->temporaryUrl() }}" class="w-1/4 ">
                        @endif
                    </label>
                    <span class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A
                        profile picture is useful to confirm your are logged into your account</span>
                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        description
                    </label>

                    <textarea id="description" rows="4" name="description" wire:model.blur='description'
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none"
                        placeholder="Write your thoughts here...">
                        </textarea>
                    <span class="text-red-500 text-sm">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" class="px-5 py-1 bg-blue-500 text-white">Submit</button>
            </div>
        </form>
    </x-modal>
</div>
