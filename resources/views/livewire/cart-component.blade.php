<div
    class="w-4/5 mx-auto flex p-6 mt-4 text-white bg-opacity-50 border-2 border-indigo-500 shadow-md backdrop-filter backdrop-blur-xl rounded-xl shadow-rose-500 bg-neutral-900">
    {{-- If no item in cart --}}
    @if (Cart::content()->count() == 0)
        <div class="w-full px-6">
            <div class="flex justify-between pb-6 border-b border-indigo-500">
                <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-500 to-cyan-500">Shopping Cart</h1>
            </div>
            <div class="w-1/3 m-12 mx-auto text-indigo-300">
                <img src="image\cart-empty.png" class="w-96 h-96">
                <p>You don't have any items in your cart.</p>
            </div>
        </div>
        {{-- If cart has items --}}
    @else
        <div class="w-full px-6">
            <div class="flex justify-between pb-6 border-b border-indigo-500 items-center">
                <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-500 to-cyan-500">Shopping Cart</h1>
                <div class="flex gap-8 items-center">
                    <p class="w-1/4 text-indigo-400 text-sm uppercase tracking-wider">
                        {{ Cart::content()->count() }}
                        Items
                    </p>
                    {{-- Checkout Button --}}
                    <x-jet-button class="w-48 py-4">
                        <p wire:loading.remove>Checkout RM{{ Cart::subtotal() }}</p>
                        <svg wire:loading viewBox="0 0 24 24" class="block m-auto -my-1 w-6 h-6 animate-spin text-white">
                            <path fill="currentColor" d="M12,4V2A10,10 0 0,0 2,12H4A8,8 0 0,1 12,4Z" />
                        </svg>
                    </x-jet-button>
                </div>
            </div>
            {{-- Iterate through the items in cart --}}
            @foreach ($cart as $cart)
                <div class="flex items-center border-b py-8 px-6 border-indigo-500 gap-8">
                    <a href="{{ route('product.show', $cart->id) }}">
                        <img class="rounded-xl w-40 hover:shadow-md hover:shadow-violet-900 transition hover:scale-105"
                            src="{{ $cart->options['image'] }}" alt="" />
                    </a>
                    <div class="flex-grow">
                        <h2 class="text-lg tracking-wider mb-2">{{ $cart->name }}</h2>
                        <p class="uppercase text-pink-500 text-sm mb-4">{{ $cart->options['size'] }}
                            / {{ $cart->options['color'] }}</p>
                        {{-- Delete item in cart --}}
                        <form class="bg-rose-500 w-20 text-center rounded-full"
                            action="{{ route('cart.destroy', $cart->rowId) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit">
                                Remove
                            </button>
                        </form>
                    </div>
                    {{-- Update cart items quantity --}}
                    <div class="flex gap-6">
                        <div class="text-lg">
                            <h2 class="text-xs bg-indigo-500 rounded-xl text-center tracking-wider mb-4">Quantity
                            </h2>
                            <div class="flex items-center">
                                <button wire:click="decreaseQuantity('{{ $cart->rowId }}')"> <svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-7 h-7 cursor-pointer text-lime-400 mx-2 active:scale-105">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg></button>
                                <h1>{{ $cart->qty }}</h1>
                                <button wire:click="increaseQuantity('{{ $cart->rowId }}')"> <svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-7 h-7 cursor-pointer text-lime-400 mx-2 active:scale-105">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg></button>
                            </div>
                        </div>
                        {{-- Item Price --}}
                        <div class="text-lg">
                            <h2 class="text-xs bg-indigo-500 rounded-xl text-center tracking-wider mb-4">Price</h2>
                            RM{{ number_format($cart->price, 2) }}
                        </div>
                        {{-- Item Subtotal --}}
                        <div class="text-lg">
                            <h2 class="text-xs bg-indigo-500 rounded-xl text-center tracking-wider mb-4">Subtotal
                            </h2>
                            <span class="text-lime-400">RM{{ number_format($cart->subtotal(), 2) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
