@section('title', 'Cart | HopeXito')
<div class="min-h-screen mb-32">
    <div class="max-w-5xl mx-auto">
        <x-jet-gradient-card>
            <div class="w-full bg-black rounded-lg md:p-6">
                {{-- If no item in cart --}}
                @if ($cart->count() == 0)
                    <div class="w-full px-6">
                        <div class="flex justify-between pb-6 border-b border-indigo-500">
                            <h1
                                class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                                Shopping Cart</h1>
                            <x-jet-button-custom onclick="window.location.href='{{ route('shop.all') }}'" class="">
                                Continue Shopping
                            </x-jet-button-custom>
                        </div>
                        <div class="w-2/3 m-12 mx-auto text-center text-indigo-300">
                            <img src="image\empty-cart.png" class="w-2/3 mx-auto">
                            <p>You don't have any items in your cart.</p>
                        </div>
                    </div>
                    {{-- If cart has items --}}
                @elseif ($cart->count() != 0)
                    <div class="w-full px-6">
                        <div
                            class="flex flex-col items-center justify-between gap-2 py-2 text-center border-b border-indigo-500 md:flex-row">
                            <x-jet-title-small>
                                Shopping Cart
                            </x-jet-title-small>
                            <div class="flex flex-col items-center gap-2 md:gap-8 md:flex-row">
                                <p class="w-full text-sm tracking-wider text-indigo-400 uppercase md:w-1/4">
                                    {{ $cart->count() }}
                                    Item(s)
                                </p>
                                {{-- Checkout Button --}}
                                <a href="{{ route('billplz-create') }}">
                                    <x-jet-button class="w-56 py-4">
                                        <p wire:loading.remove class="mx-auto text-xs">Checkout
                                            RM{{ number_format($total, 2) }}</p>
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
                            <div
                                class="flex flex-col items-center gap-8 py-8 border-b border-indigo-500 md:px-6 md:flex-row">
                                <a href="{{ route('product.show', $cart->cartProduct->slug) }}">
                                    <img class="w-56 transition shadow-lg md:w-40 rounded-xl hover:shadow-violet-500/30 hover:scale-105"
                                        src="{{ $cart->cartProduct->product_image }}" alt="" />
                                </a>
                                <div class="flex-grow text-center md:text-left">
                                    <h2 class="mb-1 tracking-wider">{{ $cart->title }}</h2>
                                    <p class="mb-4 text-pink-500 uppercase">{{ $cart->size }}
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
                                        <h2
                                            class="mb-4 py-0.5 text-xs tracking-wider text-center bg-indigo-500 rounded-xl">
                                            Quantity
                                        </h2>
                                        <div class="flex items-center">
                                            <button wire:click="decreaseQuantity('{{ $cart->id }}')"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="mx-2 cursor-pointer w-7 h-7 text-lime-400 active:scale-105">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 12h-15" />
                                                </svg></button>
                                            <h1>{{ $cart->quantity }}</h1>
                                            <button wire:click="increaseQuantity('{{ $cart->id }}')"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="mx-2 cursor-pointer w-7 h-7 text-lime-400 active:scale-105">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg></button>
                                        </div>
                                    </div>
                                    {{-- Item Price --}}
                                    <div class="text-lg">
                                        <h2
                                            class="py-0.5 mb-4 text-xs tracking-wider text-center bg-indigo-500 rounded-xl">
                                            Price
                                        </h2>
                                        RM{{ number_format($cart->price, 2) }}
                                    </div>
                                    {{-- Item Subtotal --}}
                                    <div class="text-lg">
                                        <h2
                                            class="py-0.5 mb-4 text-xs tracking-wider text-center bg-indigo-500 rounded-xl">
                                            Subtotal
                                        </h2>
                                        <span class="text-lime-400">RM{{ number_format($cart->subtotal, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </x-jet-gradient-card>
    </div>
    {{-- <div class="max-w-5xl mx-auto mt-4">
        <x-jet-admin-card>
            <div class="p-6">
                <div class="w-full px-6">
                    <div
                        class="flex flex-col items-center justify-between gap-2 py-2 text-center border-b border-indigo-500 md:flex-row">
                        <x-jet-title-small>
                            Grab Limited Time Coupon
                        </x-jet-title-small>
                        <div class="flex flex-col items-center gap-2 md:flex-row">
                            <p>Expire In:</p>
                            <p id="demo" class="bg-indigo-500 px-3 py-1 rounded-md">
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 gap-4 mt-4">
                        <div class="relative">
                            <div class="flex items-center justify-center h-16 rounded-md bg-violet-500">
                                10% Off
                            </div>
                            @if ($total >= 60)
                                <p class="absolute -bottom-7 left-0 right-0 p-2 text-center text-xs text-lime-500">
                                    Minimum spend: RM60
                                </p>
                            @else
                                <p class="absolute -bottom-7 left-0 right-0 p-2 text-center text-xs text-rose-500">
                                    Minimum spend: RM60
                                </p>
                            @endif

                        </div>
                        <div class="relative">
                            <div class="flex items-center justify-center h-16 rounded-md bg-violet-500">
                                15% Off
                            </div>
                            @if ($total >= 90)
                                <p class="absolute -bottom-7 left-0 right-0 p-2 text-center text-xs text-lime-500">
                                    Minimum spend: RM90
                                </p>
                            @else
                                <p class="absolute -bottom-7 left-0 right-0 p-2 text-center text-xs text-rose-500">
                                    Minimum spend: RM90
                                </p>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="flex items-center justify-center h-16 rounded-md bg-violet-500">
                                20% Off
                            </div>
                            @if ($total >= 120)
                                <p class="absolute -bottom-7 left-0 right-0 p-2 text-center text-xs text-lime-500">
                                    Minimum spend: RM120
                                </p>
                            @else
                                <p class="absolute -bottom-7 left-0 right-0 p-2 text-center text-xs text-rose-500">
                                    Minimum spend: RM120
                                </p>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="flex items-center justify-center h-16 rounded-md bg-violet-500">
                                25% Off
                            </div>
                            @if ($total >= 150)
                                <p class="absolute -bottom-7 left-0 right-0 p-2 text-center text-xs text-lime-500">
                                    Minimum spend: RM150
                                </p>
                            @else
                                <p class="absolute -bottom-7 left-0 right-0 p-2 text-center text-xs text-rose-500">
                                    Minimum spend: RM150
                                </p>
                            @endif
                        </div>
                    </div>
        </x-jet-admin-card>
    </div> --}}
</div>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Apr 21, 2023 23:59:59").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
</div>
</div>
