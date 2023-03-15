<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <x-jet-admin-card>
            <x-jet-admin-header>Temporary Files</x-jet-admin-header>
            <div class="grid grid-cols-4 mt-6">
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
            <x-jet-admin-header>Collection Image Files <span class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($collection_image_files) }}</span></x-jet-admin-header>
            <div class="grid grid-cols-4 mt-4">
           
                @foreach ($collection_image_files as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Cover Image Files  <span class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($cover_image_files) }}</span></x-jet-admin-header>
            <div class="grid grid-cols-4 mt-4">
                @foreach ($cover_image_files as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Image Back Files <span class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_back_files) }}</span></x-jet-admin-header>
            <div class="grid grid-cols-4 mt-4">
                @foreach ($image_back_files as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Image Front   <span class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($image_front_files) }}</span></x-jet-admin-header>
            <div class="grid grid-cols-4 mt-4">
                @foreach ($image_front_files as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Mockup Image   <span class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($mockup_image_files) }}</span></x-jet-admin-header>
            <div class="grid grid-cols-4 mt-4">
                @foreach ($mockup_image_files as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-admin-header>Profile Photos   <span class="bg-green-500 rounded-md px-2 py-0.5 ml-2">{{ count($profile_photos_files) }}</span></x-jet-admin-header>
            <div class="grid grid-cols-1 mt-4">
                @foreach ($profile_photos_files as $item)
                    <div class="flex gap-2 p-2">
                        <p>{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
    </x-jet-admin-layout>
</div>
