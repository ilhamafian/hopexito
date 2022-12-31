<x-app-layout>
    <section class="overflow-hidden text-gray-700 bg-neutral-900">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap mx-auto lg:w-4/5">
                <img class="object-cover object-center w-full rounded lg:w-1/2" src="{{ $product->front_shirt }}">
                <div
                    class="relative flex flex-col w-full p-6 mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0 col-span-full lg:col-span-4">
                    <div class="z-0">
                        <img src="{{ $product->front_shirt }}" alt=""
                            class="absolute inset-0 object-cover w-full h-full blur-sm" />
                        <div
                            class="absolute inset-0 w-full h-full opacity-95 bg-gradient-to-tr from-neutral-900 via-zinc-900 to-fuchsia-800/70 rounded-xl blur-lg">
                        </div>
                    </div>
                    <div class="z-10">
                        <h1 class="my-2 font-mono text-3xl font-medium text-indigo-500 ">{{ $product->title }}</h1>
                        <p class="text-sm text-gray-300">Designed and sold by <a
                                href="{{ route('people', $product->shopname) }}"><span
                                    class="font-bold tracking-wider text-indigo-400 hover:text-indigo-500">{{ $product->shopname }}</span></a>
                        </p>
                        <h1 class="my-2 font-mono text-3xl font-medium text-indigo-400">
                            RM{{ number_format($product->price, 2) }}</h1>
                        <form action="{{ route('cart.store') }}" method="POST" class="mt-6" x-data="{ size: '', color: '' }">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                            <h2 class="text-indigo-300">Choose Size</h2>
                            <div class="flex flex-row gap-2 my-2">
                                <div class="w-16">
                                    <input type="radio" name="size" id="XS" value="XS" class="hidden"
                                        x-on:click="size = 'XS'" x-model="size" />
                                    <label for="XS"
                                        :class="size == 'XS' ? 'border-indigo-500 text-lime-400 transition' : 'border-white '"
                                        class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">XS</label>
                                </div>
                                <div class="w-16">
                                    <input type="radio" name="size" id="S" value="S" class="hidden"
                                        x-on:click="size = 'S'" x-model="size" />
                                    <label for="S"
                                        :class="size == 'S' ? 'border-indigo-500 text-lime-400 transition' : 'border-white '"
                                        class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">S</label>
                                </div>
                                <div class="w-16">
                                    <input type="radio" name="size" id="M" value="M" class="hidden"
                                        x-on:click="size = 'M'" x-model="size" />
                                    <label for="M"
                                        :class="size == 'M' ? 'border-indigo-500 text-lime-400 transition' : 'border-white '"
                                        class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">M</label>
                                </div>
                                <div class="w-16">
                                    <input type="radio" name="size" id="L" value="L" class="hidden"
                                        x-on:click="size = 'L'" x-model="size" />
                                    <label for="L"
                                        :class="size == 'L' ? 'border-indigo-500 text-lime-400 transition' : 'border-white '"
                                        class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">L</label>
                                </div>
                                <div class="w-16">
                                    <input type="radio" name="size" id="XL" value="XL" class="hidden"
                                        x-on:click="size = 'XL'" x-model="size" />
                                    <label for="XL"
                                        :class="size == 'XL' ? 'border-indigo-500 text-lime-400 transition' : 'border-white '"
                                        class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">XL</label>
                                </div>
                            </div>
                            <h2 class="text-indigo-300">Choose Color</h2>
                            <div class="flex flex-row gap-2 my-2">
                                <div class="w-24">
                                    <input type="radio" name="color" id="black" value="black" class="hidden"
                                        x-on:click="color = 'black'" x-model="color" />
                                    <label for="black"
                                        :class="color == 'black' ? 'border-indigo-500 text-lime-400 transition' :
                                            'border-white '"
                                        class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">Black</label>
                                </div>
                                <div class="w-24">
                                    <input type="radio" name="color" id="white" value="white" class="hidden"
                                        x-on:click="color = 'white'" x-model="color" />
                                    <label for="white"
                                        :class="color == 'white' ? 'border-indigo-500 text-lime-400 transition' :
                                            'border-white '"
                                        class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">White</label>
                                </div>
                                <div class="w-24">
                                    <input type="radio" name="color" id="sand" value="sand"
                                        class="hidden" x-on:click="color = 'sand'" x-model="color" />
                                    <label for="sand"
                                        :class="color == 'sand' ? 'border-indigo-500 text-lime-400 transition' : 'border-white '"
                                        class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">Sand</label>
                                </div>
                            </div>
                            <div class="flex my-8 space-x-6">
                                <div class="flex items-center rounded-md ring-4 ring-indigo-500"
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
                                    <svg x-on:click="minus(1)" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-8 h-8 m-3 cursor-pointer text-lime-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg>
                                    <input type="text" name="quantity" x-model="quantity"
                                        class="w-16 text-lg text-center text-white bg-transparent border-none" />
                                    <svg x-on:click="plus(1)" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-8 h-8 m-3 cursor-pointer text-lime-400">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </div>
                                @if (Auth::check())
                                    <x-jet-button>
                                        Add to Cart
                                    </x-jet-button>
                                @else
                                    <x-jet-button type="button"
                                        onclick="window.location.href='{{ route('login') }}'">
                                        Add to Cart
                                    </x-jet-button>
                                @endif
                            </div>
                        </form>
                        @if (session('message'))
                            <div class="items-center p-2 leading-none text-indigo-100 transition duration-500 bg-indigo-800 lg:rounded-full lg:inline-flex"
                                role="alert" x-data="{ open: true }" x-bind:class="open ? '' : 'opacity-0'">
                                <span
                                    class="flex px-2 py-1 mr-3 text-xs font-bold uppercase bg-indigo-500 rounded-full">Success</span>
                                <span class="flex-auto mr-2 font-semibold text-left">{{ session('message') }}</span>
                                <svg x-on:click="open =! open" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 opacity-75 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="w-full mx-auto border-fuchsia-500 border-y-2 sm:py-12 sm:px-6 lg:max-w-7xl lg:px-8 ">
        <div class="flex">
            <img class="object-cover w-20 h-20 mr-6 rounded-full" src="{{ $user->profile_photo_url }}"
                alt="{{ $user->name }}" />
            <div class="flex-col my-auto">
                <a class="text-lg text-slate-300 hover:text-indigo-400"
                    href="{{ route('people', $product->shopname) }}">{{ $user->name }}
                    <br> <span class="text-sm">{{ $products->count() }} Design(s)</span>
                </a>
            </div>


        </div>

        <h2
            class="mt-4 text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-orange-500 to-orange-500">
            From the same designer</h2>
        <div class="grid grid-cols-1 mt-6 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

            @foreach ($products as $product)
                <a href="{{ route('product.show', $product->id) }}">
                    <div
                        class="relative transition shadow-lg cursor-pointer group rounded-xl hover:shadow-fuchsia-700/30">
                        <div class="w-full overflow-hidden min-h-75 group-hover:opacity-75 lg:aspect-none lg:h-75">
                            <img src="{{ $product->front_shirt }}" alt="{{ $product->title }}"
                                class=" w-full h-full transition duration-[1000ms] ease-in-out lg:h-full lg:w-full hover:scale-125">
                        </div>
                        <div class="flex flex-col justify-between px-8 py-4 tracking-wider">
                            <div class="font-medium text-white truncate">
                                {{ $product->title }}
                            </div>
                            <h2 class="text-sm text-gray-400 hover:text-cyan-500">By {{ $product->shopname }}</h2>
                            <h2 class="m-2 text-lg text-center text-fuchsia-500">
                                RM{{ number_format($product->price, 2) }}</h2>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
