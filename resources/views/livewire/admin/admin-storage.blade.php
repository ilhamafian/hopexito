<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-3 gap-8">
            <x-jet-admin-card>
                <div class="flex flex-col gap-2 items-center">
                    <x-jet-admin-header>Disk Size
                    </x-jet-admin-header>
                    {{ $diskSize }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <div class="flex flex-col gap-2 items-center">
                    <x-jet-admin-header>Collection Image Disk Size
                    </x-jet-admin-header>
                    {{ $diskCollectionSize }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <div class="flex flex-col gap-2 items-center">
                    <x-jet-admin-header>Cover Image Disk Size
                    </x-jet-admin-header>
                    {{ $diskCoverSize }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <div class="flex flex-col gap-2 items-center">
                    <x-jet-admin-header>Image Back Disk Size
                    </x-jet-admin-header>
                    {{ $diskImageBackSize }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <div class="flex flex-col gap-2 items-center">
                    <x-jet-admin-header>Image Front Disk Size
                    </x-jet-admin-header>
                    {{ $diskImageFrontSize }}
                </div>
              
            </x-jet-admin-card>
            <x-jet-admin-card>
                <div class="flex flex-col gap-2 items-center">
                    <x-jet-admin-header>Profile Photos Disk Size
                    </x-jet-admin-header>
                    {{ $diskProfilePhotoSize }}
                </div>
            </x-jet-admin-card>
        </div>

        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Temporary Files <span
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($temp) }}</span></x-jet-admin-header>
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
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($collection_image_files) }}</span>
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
                            class="flex gap-2 p-2 hover:bg-white/10 transition rounded-md">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Collection Image Path in Database <span
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($collection_image_path) }}</span>
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
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($cover_image_files) }}</span>
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
                            class="flex gap-2 p-2 hover:bg-white/10 transition rounded-md">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Cover Image Path in Database <span
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($cover_image_path) }}</span>
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
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_back_files) }}</span>
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
                            class="flex gap-2 p-2 hover:bg-white/10 transition rounded-md">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Image Back Path in Database <span
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_back_path) }}</span>
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
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_front_files) }}</span>
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
                            class="flex gap-2 p-2 hover:bg-white/10 transition rounded-md">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Image Front Path in Database <span
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_front_path) }}</span>
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
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($mockup_image_files) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($mockup_image_files as $file)
                    @php
                        $match = false;
                    @endphp
                    @foreach ($mockup_image_path as $path)
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
                            class="flex gap-2 p-2 hover:bg-white/10 transition rounded-md">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Mockup Image Path in Database<span
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($mockup_image_path) }}</span>
            </x-jet-admin-header>
            <div class="grid grid-cols-3 my-4">
                @foreach ($mockup_image_path as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Profile Photos in Files <span
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($profile_photos_files) }}</span>
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
                            class="flex gap-2 p-2 hover:bg-white/10 transition rounded-md">
                            <p class="text-rose-400">{{ $file }}</p>
                        </button>
                    @endif
                @endforeach
            </div>
            <x-jet-admin-header>Profile Photos Path in Database <span
                    class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($profile_photos_path) }}</span>
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
