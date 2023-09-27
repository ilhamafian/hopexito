@inject('carbon', 'Carbon\Carbon')
<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-3 gap-12 text-center text-white">
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Order
                </x-jet-admin-header>
                </span>
                <div class="block p-2 mt-4 text-5xl">
                    {{ $totalOrder }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Amount(RM)
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-4xl">
                    {{ number_format($totalAmount, 2) }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Delivery(RM)
                </x-jet-admin-header>
                </span>
                <div class="block p-2 mt-4 text-5xl">
                    {{ $totalDelivery }}
                </div>
            </x-jet-admin-card>
        </div>
        <div class="grid grid-cols-4 gap-12 mt-8 text-center text-white">
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Order Placed
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-5xl">
                    {{ $totalOrderPlaced }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Order Processing
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-5xl">
                    {{ $totalOrderProcessing }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Order Shipped
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-5xl">
                    {{ $totalOrderShipped }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Order Delivered
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-5xl">
                    {{ $totalOrderDelivered }}
                </div>
            </x-jet-admin-card>
        </div>

        <x-jet-section-border></x-jet-section-border>
        <x-jet-admin-card>
            <x-jet-header>List of Orders</x-jet-header>
            <div class="flex flex-col gap-2 m-4" x-data="{ id: '', copied: {}, tooltip: false, open: false, modal: false }">
                <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                    <div class="flex items-center text-sm text-white">
                        <p class="basis-[8%]"><span class="px-3 py-1 rounded-md bg-violet-500">Id</span></p>
                        <p class="basis-[17%]"><span class="px-3 py-1 rounded-md bg-violet-500">Name</span></p>
                        <p class="basis-[13%]"><span class="px-3 py-1 rounded-md bg-violet-500">Order total</span>
                        </p>
                        <p class="basis-[20%]"><span class="px-3 py-1 rounded-md bg-violet-500">Order placed
                                on</span></p>
                        <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Status</span></p>
                        <p class="basis-[15%]"><span class="px-3 py-1 rounded-md bg-violet-500">Actions</span></p>
                        <p class="basis-[15%]"><span class="px-3 py-1 rounded-md bg-violet-500">Address</span></p>
                    </div>
                </div>
                @foreach ($orders as $order)
                    {{-- Display Orders --}}
                    <div x-cloak class="w-full p-3 rounded-lg cursor-pointer bg-black/50"
                        x-on:click="id = '{{ $order->id }}'">
                        <div class="flex items-center text-sm text-white">
                            <p class="basis-[8%] text-lime-400">#{{ $order->id }}</p>
                            <p class="basis-[17%] text-xs">{{ $order->name }}</p>
                            <p class="basis-[13%]">RM {{ number_format($order->amount, 2) }} ({{ $order->delivery }})
                            </p>
                            <p class="basis-[20%]">
                                {{ $carbon::parse($order->paid_at)->format('F d, Y g:i A') }}</span>
                            </p>
                            {{-- Status of the order --}}
                            @if ($order->status == 1)
                                <p class="relative basis-[12%]"><span
                                        class="absolute w-2 h-2 p-1 rounded-full top-1.5 -left-4 bg-red-500"></span>Order
                                    Placed</p>
                            @elseif($order->status == 2)
                                <p class="relative basis-[12%]"><span
                                        class="absolute w-2 h-2 p-1 rounded-full top-1.5 -left-4 bg-orange-500"></span>Processing
                                </p>
                            @elseif($order->status == 3)
                                <p class="relative basis-[12%]"><span
                                        class="absolute w-2 h-2 p-1 rounded-full top-1.5 -left-4 bg-lime-500"></span>Shipped
                                </p>
                            @elseif($order->status == 4)
                                <p class="relative basis-[12%]"><span
                                        class="absolute w-2 h-2 p-1 rounded-full top-1.5 -left-4 bg-green-500"></span>Delivered
                                </p>
                            @endif
                            {{-- Actions button dropdown --}}
                            <div class="relative basis-[15%]">
                                <x-jet-button type="button" class="w-36 group" x-on:click="open = true">
                                    <span class="mx-auto">Actions</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </x-jet-button>
                                <ul x-show="open == true && id == '{{ $order->id }}' " x-transition.duration.500
                                    x-on:click.away="open = false"
                                    class="absolute z-10 p-2 mt-1 text-white shadow-lg bg-zinc-900 rounded-xl -left-12"
                                    style="min-width:15rem">
                                    <button wire:click="processing('{{ $order->id }}')"
                                        class="w-full px-4 py-2 text-left rounded-md hover:bg-indigo-500">
                                        Processing
                                    </button>
                                    <button x-on:click="modal = true"  wire:click="forceFill('{{ $order->id }}')"
                                        class="w-full px-4 py-2 text-left rounded-md hover:bg-indigo-500"">
                                        Shipped
                                    </button>
                                    <x-jet-modal-custom>
                                        <form class="flex-col w-full space-y-4">
                                            <p>Input tracking number for ID <span
                                                    class="text-lime-400">{{ $order->id }}</span></p>
                                            <x-jet-input type="text" wire:model.defer='tracking_number'
                                                class="block w-full mt-1" />
                                            <x-jet-button type="button" wire:click="shipped('{{ $order->id }}')"
                                                class="float-right">
                                                Save</x-jet-button>
                                        </form>
                                    </x-jet-modal-custom>
                                    <button wire:click="delivered('{{ $order->id }}')"
                                        class="w-full px-4 py-2 text-left rounded-md hover:bg-indigo-500"">
                                        Delivered
                                    </button>
                                    <button wire:click="sendMail('{{ $order->id }}')"
                                        class="w-full px-4 py-2 text-left rounded-md hover:bg-indigo-500"">
                                        Send Mail
                                    </button>
                                </ul>
                            </div>
                            {{-- Copy delivery address based on order --}}
                            <div class="relative basis-[15%]">
                                <x-jet-button-utility type="button" class="w-36 group"
                                    x-on:click="$clipboard('{{ $order->name }}, {{ $order->phone }}, {{ $order->address }}, {{ $order->postcode }}, {{ $order->state }}'); 
                                    copied['{{ $order->id }}'] = true; tooltip = true; 
                                    setTimeout(() => tooltip = false, 1000);
                                    setTimeout(() => copied['{{ $order->id }}'] = false, 1000)">
                                    <span class="mx-auto" x-transition:enter.duration.400ms
                                        x-transition:exit.duration.200ms
                                        x-show="tooltip == false || id != '{{ $order->id }}'">Copy
                                        Address</span>
                                    <span class="mx-auto" x-transition:enter.duration.200ms
                                        x-transition:exit.duration.400ms
                                        x-show="copied['{{ $order->id }}'] == true">Copied</span>
                                </x-jet-button-utility>
                            </div>
                        </div>
                    </div>
                    {{-- Display products in each orders --}}
                    <div x-cloak
                        class="flex flex-wrap px-2 mx-4 rounded-lg bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400"
                        x-show="id === '{{ $order->id }}'" :hidden="{{ !$order->id ? 'true' : 'false' }}"
                        x-transition:enter.duration.500ms>
                        @foreach ($order->productOrder as $item)
                            <div class="flex p-4 space-x-4 basis-1/3" x-data="{ download: false }"
                                x-on:mouseenter="download = true" x-on:mouseleave="download = false">
                                <a href="{{ route('product.show', $item->product_id) }}" class="relative w-40 h-40">
                                    <img class="transition rounded-lg"
                                        src="{{ $item->product->product_image }}" alt="" />
                                </a>
                                <div class="flex-col w-40 tracking-wider text-black">
                                    <p class="truncate">{{ $item->title }}</p>
                                    <p class="text-black uppercase">{{ $item->size }} /
                                        {{ $item->color }}</p>
                                    <p>
                                        RM{{ number_format($item->price, 2) }} x
                                        {{ $item->quantity }}</p>
                                    {{-- Export product image based on id --}}
                                    @if ($item->product->image_front)
                                        <button wire:click="exportFront('{{ $item->product_id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                x-show="download" x-transition.duration.500ms stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-10 h-10 p-1 mt-8 transition-all rounded-lg cursor-pointer text-black/80 hover:bg-indigo-500/50">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                            </svg>
                                        </button>
                                    @endif
                                    @if ($item->product->image_back)
                                        <button wire:click="exportBack('{{ $item->product_id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" x-show="download" x-transition.duration.500ms
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-10 h-10 p-1 mt-8 transition-all rounded-lg cursor-pointer text-black/80 hover:bg-indigo-500/50">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="mt-4">
                    {{ $orders->links('/vendor/pagination/tailwind') }}
                </div>
            </div>
        </x-jet-admin-card>
    </x-jet-admin-layout>
</div>
