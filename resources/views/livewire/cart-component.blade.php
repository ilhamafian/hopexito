<div
    class="flex w-4/5 p-6 mx-auto mt-4 text-white bg-opacity-50 border-2 border-indigo-500 shadow-md mb-96 backdrop-filter backdrop-blur-xl rounded-xl shadow-rose-500 bg-neutral-900">
    {{-- If no item in cart --}}
    @if ($cart->count() == 0)
        <div class="w-full px-6">
            <div class="flex justify-between pb-6 border-b border-indigo-500">
                <h1
                    class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-500 to-cyan-500">
                    Shopping Cart</h1>
            </div>
            <div class="w-2/3 m-12 mx-auto text-center text-indigo-300">
                <img src="image\empty-cart.png" class="w-2/3 mx-auto">
                <p>You don't have any items in your cart.</p>
            </div>
        </div>
        {{-- If cart has items --}}
    @elseif ($cart->count() != 0)
        <div class="w-full px-6">
            <div class="flex items-center justify-between pb-6 border-b border-indigo-500">
                <h1
                    class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-500 to-cyan-500">
                    Shopping Cart</h1>
                <div class="flex items-center gap-8">
                    <p class="w-1/4 text-sm tracking-wider text-indigo-400 uppercase">
                        {{ $cart->count() }}
                        Items
                    </p>
                    {{-- Checkout Button --}}
                    <a href="{{ route('billplz-create') }}">
                        <x-jet-button class="w-48 py-4">
                            <p wire:loading.remove class="mx-auto">Checkout RM{{ number_format($total, 2) }}</p>
                            <svg wire:loading viewBox="0 0 24 24"
                                class="block w-6 h-6 m-auto -my-1 text-white animate-spin">
                                <path fill="currentColor" d="M12,4V2A10,10 0 0,0 2,12H4A8,8 0 0,1 12,4Z" />
                            </svg>
                        </x-jet-button>
                    </a>

                </div>
            </div>
            {{-- Iterate through the items in cart --}}
            @foreach ($cart as $cart)
                <div class="flex items-center gap-8 px-6 py-8 border-b border-indigo-500">
                    <a href="{{ route('product.show', $cart->product_id) }}">
                        <img class="w-40 transition rounded-xl hover:shadow-md hover:shadow-violet-900 hover:scale-105"
                            src="{{ $cart->product_image }}" alt="" />
                    </a>
                    <div class="flex-grow">
                        <h2 class="mb-2 text-lg tracking-wider">{{ $cart->title }}</h2>
                        <p class="mb-4 text-sm text-pink-500 uppercase">{{ $cart->size }}
                            / {{ $cart->color }}</p>
                        {{-- Delete item in cart --}}

                        <button type="submit" class="w-20 text-center rounded-full bg-rose-500"
                            wire:click="destroyCart('{{ $cart->id }}')">
                            Remove
                        </button>
                    </div>
                    {{-- Update cart items quantity --}}
                    <div class="flex gap-6">
                        <div class="text-lg">
                            <h2 class="mb-4 text-xs tracking-wider text-center bg-indigo-500 rounded-xl">Quantity
                            </h2>
                            <div class="flex items-center">
                                <button wire:click="decreaseQuantity('{{ $cart->id }}')"> <svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="mx-2 cursor-pointer w-7 h-7 text-lime-400 active:scale-105">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg></button>
                                <h1>{{ $cart->quantity }}</h1>
                                <button wire:click="increaseQuantity('{{ $cart->id }}')"> <svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="mx-2 cursor-pointer w-7 h-7 text-lime-400 active:scale-105">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg></button>
                            </div>
                        </div>
                        {{-- Item Price --}}
                        <div class="text-lg">
                            <h2 class="mb-4 text-xs tracking-wider text-center bg-indigo-500 rounded-xl">Price</h2>
                            RM{{ number_format($cart->price, 2) }}
                        </div>
                        {{-- Item Subtotal --}}
                        <div class="text-lg">
                            <h2 class="mb-4 text-xs tracking-wider text-center bg-indigo-500 rounded-xl">Subtotal
                            </h2>
                            <span class="text-lime-400">RM{{ number_format($cart->subtotal, 2) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
