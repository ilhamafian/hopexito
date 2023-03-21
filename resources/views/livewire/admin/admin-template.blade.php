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
                            <option value="Shirt">Standard Tee</option>
                            <option value="Totebag">Totebag</option>
                            <option value="Oversized">Oversized Tee</option>
                            <option value="Hoodie">Hoodie</option>
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
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-[#1e3a8a]"
                                        value="Navy" />
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-black"
                                        value="Black" />
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-[#dfb2ae]"
                                        value="Pink" />
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
                        Total Product Template
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        {{ $totalTemplates }}
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Standard Tee Mockup
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        <x-jet-button-utility type="button"
                            onclick="window.location.href = '{{ route('product.template', 1) }}'">
                            Go to Mockup
                        </x-jet-button-utility>
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Oversized Tee Mockup
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        <x-jet-button-utility type="button"
                            onclick="window.location.href = '{{ route('product.template', 2) }}'">
                            Go to Mockup
                        </x-jet-button-utility>
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Totebag Mockup
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        <x-jet-button-utility type="button">
                            Go to Mockup
                        </x-jet-button-utility>
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Sweater Mockup
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        <x-jet-button-utility type="button">
                            Go to Mockup
                        </x-jet-button-utility>
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Hoodie Mockup
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        <x-jet-button-utility type="button">
                            Go to Mockup
                        </x-jet-button-utility>
                    </div>
                </x-jet-admin-card>

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
