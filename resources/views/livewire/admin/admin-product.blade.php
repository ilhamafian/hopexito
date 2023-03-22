<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-1 gap-12 text-white">
            <div class="grid grid-cols-4 gap-12 text-center text-white">
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
                        Total Product Collection
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-5xl">
                        {{ $totalCollection }}
                    </div>
                </x-jet-admin-card>
            </div>
            <div class="col-span-2 p-1 rounded-2xl bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                    <x-jet-header>List of Tags</x-jet-header>
                    <div class="grid max-h-screen grid-cols-6 gap-2 mt-5 overflow-scroll">
                        @foreach ($tags as $item)
                            <a class="relative h-14" x-data="{ open: false }" x-on:mouseenter="open = true"
                                x-on:mouseleave="open = false">
                                <p class="px-3 py-2 transition bg-orange-500 rounded-md hover:bg-fuchsia-500">
                                    {{ $item }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-span-2 p-1 rounded-2xl bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                    <x-jet-header>List of Products</x-jet-header>
                    <x-jet-input class="" type="text" wire:model.lazy="search"
                        placeholder="Search by product name" />
                    <div class="grid max-h-screen grid-cols-4 gap-2 mt-5 overflow-scroll">
                        @foreach ($products as $item)
                            <a href="{{ route('product.show', $item->slug) }}" class="relative flex flex-col h-24"
                                x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false">
                                <div class="flex flex-col gap-2 px-3 py-2.5 transition rounded-md bg-black border-2 border-indigo-500 hover:bg-indigo-500/60">
                                    <p class="block w-full">
                                        <span class="text-xs bg-blue-500 mr-2 rounded-md px-2 py-0.5">{{ $item->status }}</span>
                                        <span class="text-xs bg-rose-500 mr-2 rounded-md px-2 py-0.5">{{ $item->id }}</span>
                                        <span class="text-xs bg-lime-500 mr-2 rounded-md px-2 py-0.5">{{ $item->sold }}</span>
                                    </p>
                     
                                        {{ $item->title }}
                                </div>  
                                <svg class="absolute p-1 transition rounded-md cursor-pointer top-2 right-2 hover:bg-rose-500 w-7 h-7"
                                    x-show="open" wire:click.prevent="deleteProduct('{{ $item->id }}')"
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
        </div>
    </x-jet-admin-layout>
</div>
