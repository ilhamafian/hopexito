@section('title', 'Designers Collection | HopeXito')
<x-app-layout>

    <div class="w-full min-h-screen px-2 py-12 mx-auto mb-32 md:px-6 lg:max-w-7xl lg:px-8">
        <x-jet-title>Designers Collection</x-jet-title>
        <div>
            <div class="relative flex flex-col gap-4 my-4">
                @foreach ($productsCollection as $item)
                    <div style="background-image: url('{{ asset('storage/collection-image/' . $item->collection_image) }}')"
                        class="relative block overflow-hidden bg-center bg-no-repeat bg-cover md:rounded-xl ">
                        <span
                            class="absolute z-10 items-center hidden px-3 py-1 font-semibold text-white bg-black rounded-full md:inline-flex right-4 top-4">
                            {{ $item->product->count() }}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="ml-1.5 h-4 w-4 text-pink-500">
                                <path
                                    d="M11.983 1.907a.75.75 0 00-1.292-.657l-8.5 9.5A.75.75 0 002.75 12h6.572l-1.305 6.093a.75.75 0 001.292.657l8.5-9.5A.75.75 0 0017.25 8h-6.572l1.305-6.093z" />
                            </svg>
                        </span>
                        <div class="relative text-white bg-black md:p-8 h-96 bg-opacity-30">
                            <h3
                                class="px-6 py-2 mt-4 text-lg tracking-wider rounded-full md:text-2xl bg-black/80 w-fit">
                                {{ $item->title }}</h3>
                        </div>
                    </div>
                    <div class="max-w-5xl mx-auto md:-translate-y-60 -translate-y-72 -mb-28">
                        <x-jet-admin-card>
                            <div class="grid grid-cols-2 gap-2 mx-auto mt-6 sm:grid-cols-3 lg:grid-cols-4">
                                @foreach ($item->product as $product)
                                    <a href="{{ route('product.show', $product->slug) }}" x-data="{ open: false }">
                                        <div
                                            class="relative p-1 transition shadow-lg cursor-pointer group rounded-xl hover:shadow-fuchsia-500/50 bg-black/10 backdrop-filter backdrop-blur-3xl">
                                            <div class="w-full overflow-hidden rounded-lg min-h-75"
                                                x-on:mouseenter="open = true" x-on:mouseleave="open = false">
                                                @if ($product->product_image_2)
                                                    <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                                                        x-show="open == false"
                                                        class="w-full h-full transition ease-in-out rounded-t-lg">

                                                    <img x-cloak src="{{ $product->product_image_2 }}"
                                                        alt="{{ $product->title }}" x-show="open == true"
                                                        class="w-full h-full transition ease-in-out rounded-t-lg">
                                                @else
                                                    <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                                                        class="w-full h-full transition ease-in-out rounded-t-lg">
                                                @endif
                                            </div>
                                            <div
                                                class="flex flex-col justify-between px-2 py-1 tracking-wider md:px-4 md:py-2">
                                                <div class="text-sm text-white truncate md:font-medium">
                                                    {{ $product->title }}
                                                </div>
                                                <h2 class="hover:text-fuchsia-500">By {{ $product->shopname }}
                                                </h2>
                                                <h2 class="m-1 text-lg text-center md:m-2 text-fuchsia-500">
                                                    RM{{ number_format($product->price, 2) }}</h2>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </x-jet-admin-card>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
