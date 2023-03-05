@section('title', $product->title . ' | HopeXito')
<x-app-layout>
    <section class="min-h-screen text-gray-700 bg-neutral-900 pb-12" x-data="{ preview: 1 }">
        <x-jet-session-message />
        <div class="py-4 mx-auto">
            <div class="flex flex-wrap mx-auto lg:w-4/5">
                    <div class="relative mx-auto max-w-screen-xl px-4">
                        <div class="grid gap-8 lg:grid-cols-4 lg:items-start">
                            <div class="lg:col-span-2">
                                <div class="relative" x-show="preview == 1" x-transition:enter.duration.500ms>
                                    <div class="w-full overflow-hidden rounded-lg" id="product-image">
                                        <img class="w-full h-full"
                                            src="{{ $product->product_image }}">
                                    </div>
                                </div>
                                <div x-cloak class="relative" x-show="preview == 2" x-transition:enter.duration.500ms>
                                    <div class="w-full overflow-hidden rounded-lg">
                                        <img class="w-full h-full"
                                            src="{{ $product->product_image_2 }}">
                                    </div>
                                </div>
                                <div class="mt-3 flex gap-3 cursor-pointer">
                                    <img alt="Tee" src="{{ $product->product_image }}" x-on:click="preview = 1"
                                        class="h-36 w-36 rounded-md object-cover"
                                        x-bind:class="preview == 1 ? 'ring ring-indigo-500' : ''" />
                                    @if ($product->product_image_2)
                                        <img alt="Tee" src="{{ $product->product_image_2 }}"
                                            x-on:click="preview = 2" class="h-36 w-36 rounded-md object-cover"
                                            x-bind:class="preview == 2 ? 'ring ring-indigo-500' : ''" />
                                    @endif
                                </div>
                            </div>

                            <div class="col-span-2 relative flex flex-col w-full p-6">
                                <div class="z-10 md:py-12">
                                    <p class="my-1 text-2xl font-medium text-indigo-500 ">{{ $product->title }}</p>
                                    <div class="flex items-center space-x-8">
                                        <p class="text-sm text-gray-300">Designed by <a
                                                href="{{ route('people', $product->shopname) }}"><span
                                                    class="font-bold tracking-wider text-indigo-400 hover:text-indigo-500">{{ $product->shopname }}</span></a>
                                        </p>
                                    </div>
                                    <h1 class="my-2 text-2xl font-medium text-indigo-400">
                                        RM{{ number_format($product->price, 2) }}</h1>
                                    <form action="{{ route('cart.store') }}" method="POST" class="mt-6"
                                        x-data="{ size: '', color: '' }">
                                        @csrf
                                        <div class="flex items-center gap-2">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                            <h2 class="text-indigo-300">Choose Size</h2>
                                            @error('size')
                                                <p class="w-2 h-2 rounded-full bg-rose-500"></p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row gap-2 my-2">
                                            <div class="w-16">
                                                <input type="radio" name="size" id="XS" value="XS"
                                                    class="hidden" x-on:click="size = 'XS'" x-model="size" />
                                                <label for="XS"
                                                    :class="size == 'XS' ? 'border-indigo-500 text-lime-400 transition' :
                                                        'border-white '"
                                                    class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">XS</label>
                                            </div>
                                            <div class="w-16">
                                                <input type="radio" name="size" id="S" value="S"
                                                    class="hidden" x-on:click="size = 'S'" x-model="size" />
                                                <label for="S"
                                                    :class="size == 'S' ? 'border-indigo-500 text-lime-400 transition' :
                                                        'border-white '"
                                                    class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">S</label>
                                            </div>
                                            <div class="w-16">
                                                <input type="radio" name="size" id="M" value="M"
                                                    class="hidden" x-on:click="size = 'M'" x-model="size" />
                                                <label for="M"
                                                    :class="size == 'M' ? 'border-indigo-500 text-lime-400 transition' :
                                                        'border-white '"
                                                    class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">M</label>
                                            </div>
                                            <div class="w-16">
                                                <input type="radio" name="size" id="L" value="L"
                                                    class="hidden" x-on:click="size = 'L'" x-model="size" />
                                                <label for="L"
                                                    :class="size == 'L' ? 'border-indigo-500 text-lime-400 transition' :
                                                        'border-white '"
                                                    class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">L</label>
                                            </div>
                                            <div class="w-16">
                                                <input type="radio" name="size" id="XL" value="XL"
                                                    class="hidden" x-on:click="size = 'XL'" x-model="size" />
                                                <label for="XL"
                                                    :class="size == 'XL' ? 'border-indigo-500 text-lime-400 transition' :
                                                        'border-white '"
                                                    class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">XL</label>
                                            </div>

                                        </div>
                                        <div class="flex items-center gap-2">
                                            <h2 class="text-indigo-300">Choose Color</h2>
                                            @error('color')
                                                <p class="w-2 h-2 rounded-full bg-rose-500"></p>
                                            @enderror
                                        </div>
                                        <div class="flex flex-row gap-2 my-2">
                                            @foreach ($colors as $color)
                                                <div class="w-24">
                                                    <input type="radio" name="color" id="{{ $color }}"
                                                        value="{{ $color }}" class="hidden"
                                                        x-on:click="color = '{{ $color }}'" x-model="color" />
                                                    <label for="{{ $color }}"
                                                        :class="color == '{{ $color }}' ?
                                                            'border-indigo-500 text-lime-400 transition' :
                                                            'border-white '"
                                                        class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">{{ $color }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="flex flex-col gap-4 my-8 md:flex-row">
                                            <div class="flex items-center justify-between px-4 rounded-md md:px-0 ring-4 ring-indigo-500"
                                                x-data="{
                                                    quantity: 1,
                                                    minus(value) {
                                                        this.quantity = parseInt(this.quantity);
                                                        (this.quantity == 1) ? this.quantity = 1: this.quantity -= value;
                                                    },
                                                    plus(value) {
                                                        this.quantity = parseInt(this.quantity);
                                                        this.quantity += value;
                                                    }
                                                }">
                                                <svg x-on:click="minus(1)" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="m-3 cursor-pointer w-7 h-7 text-lime-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 12h-15" />
                                                </svg>
                                                <input type="text" name="quantity" x-model="quantity"
                                                    class="w-16 text-lg text-center text-white bg-transparent border-none" />
                                                <svg x-on:click="plus(1)" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="m-3 cursor-pointer w-7 h-7 text-lime-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                            </div>
                                            @if (Auth::check())
                                                <x-jet-button class="w-full py-4 mt-4 md:mt-0 md:w-auto">
                                                    <span class="mx-auto">Add to Cart</span>
                                                </x-jet-button>
                                            @else
                                                <div x-data="{ modal: false }">
                                                    <x-jet-button type="button"
                                                        class="w-full py-4 mt-4 md:mt-0 md:w-auto"
                                                        x-on:click="modal = true">
                                                        Add to Cart
                                                    </x-jet-button>
                                                    <x-jet-modal-custom>
                                                        <div class="flex flex-col">
                                                            <p class="mb-8 text-xs text-indigo-500">Sign up or
                                                                login to complete
                                                                purchase and
                                                                unlock exclusive deals.</p>
                                                            <div class="flex h-10 gap-2">
                                                                <x-jet-button-utility
                                                                    onclick="window.location.href='{{ route('login') }}'"
                                                                    class="w-full">
                                                                    <span class="mx-auto">Login</span>
                                                                </x-jet-button-utility>
                                                                <x-jet-button
                                                                    onclick="window.location.href='{{ route('register') }}'"
                                                                    class="w-full">
                                                                    <span class="mx-auto">Sign up</span>
                                                                </x-jet-button>
                                                            </div>
                                                        </div>
                                                    </x-jet-modal-custom>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <x-jet-gradient-card>
        <div class="min-h-screen py-8 bg-black/90 rounded-xl">
            <div class="relative w-full px-2 py-6 mx-auto lg:max-w-7xl">
                <x-jet-title>
                    From the same designer
                </x-jet-title>
                <div class="grid grid-cols-2 gap-2 mx-auto mt-6 md:gap-6 sm:grid-cols-3 lg:grid-cols-4">
                    @foreach ($products as $product)
                        <a href="{{ route('product.show', $product->slug) }}">
                            <div
                                class="relative p-1 transition shadow-lg cursor-pointer group rounded-xl hover:shadow-fuchsia-500/50 bg-white/5 backdrop-filter backdrop-blur-3xl">
                                <div class="w-full overflow-hidden rounded-t-lg min-h-75">
                                    <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                                        class="w-full h-full transition ease-in-out hover:scale-125">
                                </div>
                                <div class="flex flex-col justify-between px-2 py-1 tracking-wider md:px-4 md:py-2">
                                    <div class="text-sm text-white truncate md:font-medium">
                                        {{ $product->title }}
                                    </div>
                                    <h2 class=" hover:text-fuchsia-500">By {{ $product->shopname }}
                                    </h2>
                                    <h2 class="m-1 text-lg text-center md:m-2 text-fuchsia-500">
                                        RM{{ number_format($product->price, 2) }}</h2>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </x-jet-gradient-card>
    <x-jet-gradient-card>
        <div class="py-8 bg-black/90 md:rounded-xl">
            <div class="relative w-full px-2 py-6 mx-auto lg:max-w-7xl">
                <x-jet-title>Discover other products</x-jet-title>
                <div class="grid grid-cols-2 gap-2 mx-auto mt-6 md:gap-6 sm:grid-cols-3 lg:grid-cols-4">
                    @foreach ($discover as $item)
                        <a href="{{ route('product.show', $item->slug) }}">
                            <div
                                class="relative p-1 transition shadow-lg cursor-pointer group rounded-xl hover:shadow-fuchsia-500/50 bg-white/5 backdrop-filter backdrop-blur-3xl">
                                <div class="w-full overflow-hidden rounded-lg min-h-75">
                                    <img src="{{ $item->product_image }}" alt="{{ $item->title }}"
                                        class="w-full h-full transition ease-in-out rounded-t-lg hover:scale-125">
                                </div>
                                <div class="flex flex-col justify-between px-2 py-1 tracking-wider md:px-4 md:py-2">
                                    <div class="font-medium text-white truncate">
                                        {{ $item->title }}
                                    </div>
                                    <h2 class="text-sm text-gray-400 hover:text-fuchsia-500">By
                                        {{ $item->shopname }}
                                    </h2>
                                    <h2 class="m-1 text-lg text-center md:m-2 text-fuchsia-500">
                                        RM{{ number_format($item->price, 2) }}</h2>
                                </div>

                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </x-jet-gradient-card>
</x-app-layout>
