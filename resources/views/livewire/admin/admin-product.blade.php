<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-2 gap-12 text-white">
            <div class="p-1 rounded-2xl bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                <div class="flex flex-col p-6 bg-black rounded-xl">
                    <x-jet-header>Add Product Mockup Template</x-jet-header>
                    <form method="POST" action="{{ route('upload.template') }}" enctype="multipart/form-data"
                        class="space-y-4">
                        @csrf
                        <x-jet-label for="mockup_image" value="{{ __('Mockup Image') }}" />
                        <input type="file" id="mockup-image" name="mockup_image" wire:model.defer="mockup_image"
                            class="w-full">
                        <x-jet-label for="mockup_image_2" value="{{ __('Mockup Image 2') }}" />
                        <input type="file" id="mockup-image-2" name="mockup_image_2"
                            wire:model.defer="mockup_image_2" class="w-full">

                        <x-jet-label for="category" value="{{ __('Category') }}" />
                        <select id="category" wire:model.defer="category" name="category"
                            class="text-white block w-full p-2.5 bg-neutral-800 border border-neutral-500 rounded-md focus:ring-indigo-500">
                            <option selected class="">Choose a category</option>
                            <option value="Shirt">Shirt</option>
                            <option value="Totebag">Totebag</option>
                            <option value="Hoodie">Oversized Tee</option>
                            <option value="Oversized">Hoodie</option>
                            <option value="Sweatshirt">Sweater</option>
                            <option value="Sweatshirt">Sublimation</option>
                        </select>
                        <div class="flex gap-4">
                            <div class="basis-1/3">
                                <x-jet-label for="commission" value="{{ __('Commission(%)') }}" />
                                <x-jet-input id="commission" name="commission" type="text"
                                    wire:model.defer="commission" class="block w-full mt-1" />
                            </div>
                            <div class="basis-1/3">
                                <x-jet-label for="min" value="{{ __('Min(RM)') }}" />
                                <x-jet-input id="min" name="min" type="text" wire:model.defer="min"
                                    class="block w-full mt-1" />
                            </div>
                            <div class="basis-1/3">
                                <x-jet-label for="color" value="{{ __('Available Color') }}" />
                                <div class="flex items-center w-fit gap-2 bg-neutral-800 p-1.5 rounded-md">
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-white"
                                        value="White" />
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-[#808080]"
                                        value="Gray" />
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-black"
                                        value="Black" />
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-[#d7c6c3]"
                                        value="Beige" />
                                </div>
                            </div>
                        </div>
                        <x-jet-button class="float-right mt-4">Add Product Template</x-jet-button>
                    </form>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-12 text-center text-white">
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Total Product
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        {{ $totalProducts }}
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Average Product Price(RM)
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-4xl">
                        {{ number_format($averagePrice, 2) }}
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Total Product Sold
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        {{ $totalSold }}
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Total Product Template
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        {{ $totalTemplates }}
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Total Product Collection
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        {{ $totalCollection }}
                    </div>
                </x-jet-admin-card>
            </div>
            <div class="col-span-2 p-1 rounded-2xl bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                    <x-jet-header>List of Products</x-jet-header>
                    <x-jet-input class="" type="text" wire:model.lazy="search"
                        placeholder="Search by product name" />
                    <div class="grid max-h-screen grid-cols-4 gap-2 mt-5 overflow-scroll">
                        @foreach ($products as $product)
                            <a href="{{ route('product.show', $product->slug) }}" class="relative h-14"
                                x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false">
                                <p class="px-3 py-2 transition rounded-md bg-emerald-500 hover:bg-indigo-500">
                                    {{ $product->title }}</p>
                                <svg class="absolute p-1 transition rounded-md cursor-pointer top-0.5 right-0.5 hover:bg-indigo-500 w-7 h-7"
                                    x-show="open" wire:click="deleteProduct('{{ $product->id }}')"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Include Filepond --}}
            <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
            <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
            <script>
                FilePond.registerPlugin(FilePondPluginImagePreview);
                const fileInput = document.querySelector('input[id="mockup-image"]');
                const fileInputBack = document.querySelector('input[id="mockup-image-2"]');
                const pond = FilePond.create(fileInput);
                const pond_2 = FilePond.create(fileInputBack);

                FilePond.setOptions({
                    server: {
                        url: '{{ route('upload') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                });
            </script>
        </div>
    </x-jet-admin-layout>
</div>
