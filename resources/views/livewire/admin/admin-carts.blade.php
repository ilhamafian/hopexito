@inject('carbon', 'Carbon\Carbon')
<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-3 gap-12 text-center text-white">
            <x-jet-admin-card>
                <span class="px-4 py-2 rounded-md bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                    Total Cart
                </span>
                <div class="block p-2 mt-4 text-3xl">
                    {{ $totalCart }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <span class="px-4 py-2 rounded-md bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                    Total Subtotal(RM)
                </span>
                <div class="block p-2 mt-4 text-3xl">
                    {{ number_format($subtotal, 2) }}

                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <span class="px-4 py-2 rounded-md bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                    Average Subtotal(RM)
                </span>
                <div class="block p-2 mt-4 text-3xl">
                    {{ number_format($avgSubtotal, 2) }}
                </div>
            </x-jet-admin-card>
        </div>
        <div class="grid grid-cols-2 gap-12 mt-8 text-center text-white">
            <x-jet-admin-card>
                <span class="px-4 py-2 rounded-md bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                    Color Distribution
                </span>
                <div class="flex items-center gap-4 p-2 mt-4">
                    @foreach ($colorDistribution as $item)
                        <p class="px-2 py-1 rounded-md bg-emerald-500">{{ $item->color }}</p>
                        <p class="">{{ $item->count }}</p>
                    @endforeach
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <span class="px-4 py-2 rounded-md bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                    Size Distribution
                </span>
                <div class="flex items-center gap-4 p-2 mt-4">
                    @foreach ($sizeDistribution as $item)
                        <p class="px-2 py-1 rounded-md bg-emerald-500">{{ $item->size }}</p>
                        <p class="">{{ $item->count }}</p>
                    @endforeach
                </div>
            </x-jet-admin-card>
        </div>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-header>List of Carts</x-jet-header>
            <div class="flex flex-col gap-2 m-4" x-data="{ id: '', copied: {}, tooltip: false, open: false, modal: false }">
                <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                    <div class="flex items-center text-sm text-center text-white">
                        <p class="basis-[5%]"><span class="px-3 py-1 rounded-md bg-violet-500">ID</span></p>
                        <p class="basis-[15%]"><span class="px-3 py-1 rounded-md bg-violet-500">Email</span>
                        </p>
                        <p class="basis-[18%]"><span class="px-3 py-1 rounded-md bg-violet-500">Title</span></p>
                        <p class="basis-[6%]"><span class="px-3 py-1 rounded-md bg-violet-500">Qty</span></p>
                        <p class="basis-[7%]"><span class="px-3 py-1 rounded-md bg-violet-500">Price</span></p>
                        <p class="basis-[9%]"><span class="px-3 py-1 rounded-md bg-violet-500">Subtotal</span></p>
                        <p class="basis-[7%]"><span class="px-3 py-1 rounded-md bg-violet-500">Weight</span></p>
                        <p class="basis-[7%]"><span class="px-3 py-1 rounded-md bg-violet-500">Size</span></p>
                        <p class="basis-[7%]"><span class="px-3 py-1 rounded-md bg-violet-500">Color</span></p>
                        <p class="basis-[18%]"><span class="px-3 py-1 rounded-md bg-violet-500">Last Updated</span></p>
                    </div>
                </div>
                @foreach ($carts as $cart)
                    <div class="w-full p-3 rounded-lg bg-black/50">
                        <div class="flex items-center text-sm text-center text-white">
                            <p class="basis-[5%]">{{ $cart->product_id }}</p>
                            <p class="basis-[15%] truncate">{{ $cart->email }}</p>
                            <p class="basis-[18%] truncate">{{ $cart->title }}</p>
                            <p class="basis-[6%]">{{ $cart->quantity }}</p>
                            <p class="basis-[7%]">{{ number_format($cart->price, 2) }}</p>
                            <p class="basis-[9%]">{{ number_format($cart->subtotal, 2) }}</p>
                            <p class="basis-[7%]">{{ $cart->weight }}</p>
                            <p class="basis-[7%]">{{ $cart->size }}</p>
                            <p class="basis-[7%]">{{ $cart->color }}</p>
                            <p class="basis-[18%]"> {{ $carbon::parse($cart->updated_at)->format('F d, Y g:i A') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
    </x-jet-admin-layout>
</div>
