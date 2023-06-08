<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-2 gap-8">
            <x-jet-admin-card>
                <div class="flex flex-col items-center gap-2">
                    <x-jet-admin-header>Database Size
                    </x-jet-admin-header>
                    <p class="text-xl tracking-wider text-indigo-400">
                        {{ $DBSize[0]->size }} MB
                    </p>
                    <div class="text-center">
                        <p class="px-2 py-0.5 bg-violet-600 rounded-md">Product Table Size</p>
                        <p class="mx-2 mt-1 text-lg rounded-md ring-2 ring-fuchsia-600">
                            {{ $productDBSize[0]->size }} MB
                        </p>
                    </div>
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <div class="flex flex-col items-center gap-2">
                    <x-jet-admin-header>Disk Size
                    </x-jet-admin-header>
                    <p class="text-xl tracking-wider text-indigo-400">
                        {{ $diskSize }}
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div>
                            <p class="px-2 py-0.5 bg-violet-600 rounded-md">Collection Image Size</p>
                            <p class="mx-2 mt-1 text-lg rounded-md ring-2 ring-fuchsia-600">
                                {{ $diskCollectionSize }}
                            </p>
                        </div>
                        <div>
                            <p class="px-2 py-0.5 bg-violet-600 rounded-md">Cover Image Size</p>
                            <p class="mx-2 mt-1 text-lg rounded-md ring-2 ring-fuchsia-600">
                                {{ $diskCoverSize }}
                            </p>
                        </div>
                        <div>
                            <p class="px-2 py-0.5 bg-violet-600 rounded-md">Image Back Size</p>
                            <p class="mx-2 mt-1 text-lg rounded-md ring-2 ring-fuchsia-600">
                                {{ $diskImageBackSize }}
                            </p>
                        </div>
                        <div>
                            <p class="px-2 py-0.5 bg-violet-600 rounded-md">Image Front Size</p>
                            <p class="mx-2 mt-1 text-lg rounded-md ring-2 ring-fuchsia-600">
                                {{ $diskImageFrontSize }}
                            </p>
                        </div>
                        <div>
                            <p class="px-2 py-0.5 bg-violet-600 rounded-md">Profile Photos Size</p>
                            <p class="mx-2 mt-1 text-lg rounded-md ring-2 ring-fuchsia-600">
                                {{ $diskProfilePhotoSize }}
                            </p>
                        </div>
                    </div>       
                </div>
            </x-jet-admin-card>
        </div>

        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Temporary Files <span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($temp) }}</span></x-jet-admin-header>
                    <x-jet-button class="ml-2" type="button" wire:click="clearTemp">Clear Temporary Files</x-jet-button>
            <div class="grid grid-cols-3 mt-6">
                @foreach ($temp as $item)
                    <div class="flex gap-2">
                        <p>{{ $item->id }}</p>
                        <span>&middot;</span>
                        <p>{{ $item->filename }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Collection Image in Files <span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($collection_image_files) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($collection_image_files as $file)
                    @php
                        $match = false;
                    @endphp
                    @foreach ($collection_image_path as $path)
                        @if ($file === basename($path))
                            <div class="flex gap-2 p-2">
                                <p class="text-lime-400">{{ $file }}</p>
                            </div>
                            @php
                                $match = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @if (!$match)
                        <button type="button" wire:click="unlink('{{ $file }}')"
                            class="flex gap-2 p-2 transition rounded-md hover:bg-white/10">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Collection Image Path in Database <span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($collection_image_path) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($collection_image_path as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Cover Image in Files <span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($cover_image_files) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($cover_image_files as $file)
                    @php
                        $match = false;
                    @endphp
                    @foreach ($cover_image_path as $path)
                        @if ($file === basename($path))
                            <div class="flex gap-2 p-2">
                                <p class="text-lime-400">{{ $file }}</p>
                            </div>
                            @php
                                $match = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @if (!$match)
                        <button type="button" wire:click="unlink('{{ $file }}')"
                            class="flex gap-2 p-2 transition rounded-md hover:bg-white/10">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Cover Image Path in Database <span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($cover_image_path) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($cover_image_path as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Image Back in Files <span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_back_files) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($image_back_files as $file)
                    @php
                        $match = false;
                    @endphp
                    @foreach ($image_back_path as $path)
                        @if ($file === basename($path))
                            <div class="flex gap-2 p-2">
                                <p class="text-lime-400">{{ $file }}</p>
                            </div>
                            @php
                                $match = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @if (!$match)
                        <button type="button" wire:click="unlink('{{ $file }}')"
                            class="flex gap-2 p-2 transition rounded-md hover:bg-white/10">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Image Back Path in Database <span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_back_path) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($image_back_path as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Image Front in Files<span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_front_files) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($image_front_files as $file)
                    @php
                        $match = false;
                    @endphp
                    @foreach ($image_front_path as $path)
                        @if ($file === basename($path))
                            <div class="flex gap-2 p-2">
                                <p class="text-lime-400">{{ $file }}</p>
                            </div>
                            @php
                                $match = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @if (!$match)
                        <button type="button" wire:click="unlink('{{ $file }}')"
                            class="flex gap-2 p-2 transition rounded-md hover:bg-white/10">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Image Front Path in Database <span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_front_path) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($image_front_path as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Mockup Image in Files<span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($mockup_image_files) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($mockup_image_files as $file)
                    @php
                        $match = false;
                    @endphp
                    @foreach ($mockup_image_path as $path)
                        @if ($file === basename($path))
                            <div class="flex gap-2 p-2">
                                <p class="text-blue-400">{{ $file }}</p>
                            </div>
                            @php
                                $match = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @if (!$match)
                        <button type="button" wire:click="unlink('{{ $file }}')"
                            class="flex gap-2 p-2 transition rounded-md hover:bg-white/10">
                            <p class="text-teal-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Mockup Image Path in Database<span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($mockup_image_path) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($mockup_image_path as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
            <x-jet-admin-header>Mockup Image 2 Path in Database<span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($mockup_image_2_path) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($mockup_image_2_path as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Profile Photos in Files <span
                    class="bg-indigo-500 rounded-md px-2 py-0.5 ml-2">{{ count($profile_photos_files) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-2 my-4">
                @foreach ($profile_photos_files as $file)
                    @php
                        $match = false;
                    @endphp
                    @foreach ($profile_photos_path as $path)
                        @if ($file === basename($path))
                            <div class="flex gap-2 p-2">
                                <p class="text-lime-400">{{ $file }}</p>
                            </div>
                            @php
                                $match = true;
                                break;
                            @endphp
                        @endif
                    @endforeach
                    @if (!$match)
                        <button type="button" wire:click="unlink('{{ $file }}')"
                            class="flex gap-2 p-2 transition rounded-md hover:bg-white/10">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Profile Photos Path in Database <span
                    class="bg-rose-400 rounded-md px-2 py-0.5 ml-2">{{ count($profile_photos_path) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-2 my-4">
                @foreach ($profile_photos_path as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
    </x-jet-admin-layout>
</div>
