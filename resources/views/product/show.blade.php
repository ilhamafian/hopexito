<x-app-layout>
    <div class="bg-neutral-900 min-h-screen">
        <div class="flex w-2/3 py-6 mx-auto">
            {{-- Product Options --}}
            <div class="flex-1 p-12">
                    <h1 class="font-mono text-3xl tracking-wide text-white">{{ $product->title }}</h1>

                    <div class="flex items-center justify-between mt-4 font-mono">
                        <span class="text-3xl text-white">RM {{ number_format($product->price, 2) }}</span>
                    </div>
                    {{-- Add To Cart Form --}}
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
                                    :class="color == 'black' ? 'border-indigo-500 text-lime-400 transition' : 'border-white '"
                                    class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">Black</label>
                            </div>
                            <div class="w-24">
                                <input type="radio" name="color" id="white" value="white" class="hidden"
                                    x-on:click="color = 'white'" x-model="color" />
                                <label for="white"
                                    :class="color == 'white' ? 'border-indigo-500 text-lime-400 transition' : 'border-white '"
                                    class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">White</label>
                            </div>
                            <div class="w-24">
                                <input type="radio" name="color" id="sand" value="sand" class="hidden"
                                    x-on:click="color = 'sand'" x-model="color" />
                                <label for="sand"
                                    :class="color == 'sand' ? 'border-indigo-500 text-lime-400 transition' : 'border-white '"
                                    class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">Sand</label>
                            </div>
                        </div>
                        <div class="flex my-8 space-x-6">
                            <div class="flex items-center rounded-md ring-4 ring-indigo-500" x-data="{
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
                                    class="w-8 h-8 m-4 cursor-pointer text-lime-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg>
                                <input type="text" name="quantity" x-model="quantity"
                                    class="w-16 text-lg text-center text-white bg-transparent border-none" />
                                <svg x-on:click="plus(1)" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-8 h-8 m-4 cursor-pointer text-lime-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </div>
                            <x-jet-button>
                                Add to Cart
                            </x-jet-button>
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
            {{-- Product Thumbnail --}}
            <div class="flex-1">
                <div class="">
                    <img class="rounded-3xl" src="{{ $product -> front_shirt }}" alt="" />
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
