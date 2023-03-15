<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-1">
            <x-jet-admin-card>
                <div class="w-full flex justify-center gap-2">
                    <x-jet-button type="button" wire:click="deleteInventory()">Delete Inventory</x-jet-button>
                    <x-jet-button-utility type="button" wire:click="createInventory()">Create Inventory</x-jet-button-utility>
                </div>
                <div class="grid grid-cols-4 mt-12">
                    @foreach ($inventories as $item)
                        <div class="flex flex-col gap-2 m-4">
                            <p class="bg-indigo-700 px-3 py-1 rounded-lg">{{ $item->color }} | {{ $item->size }} | {{ $item->category }}</p>
                            <p class="bg-fuchsia-700 px-3 py-1 rounded-lg">{{ $item->updated_at }}</p>
                            <div
                                class="flex items-center justify-between px-4 rounded-md md:px-0 ring-4 ring-indigo-500">
                                <svg wire:click="decreaseInventory({{ $item->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="m-3 cursor-pointer w-7 h-7 text-lime-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg>
                                <input type="text" value="{{ $item->amount }}"
                                    class="w-16 text-lg text-center text-white bg-transparent border-none" />
                                <svg wire:click="increaseInventory({{ $item->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="m-3 cursor-pointer w-7 h-7 text-lime-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-jet-admin-card>
        </div>
    </x-jet-admin-layout>

</div>
