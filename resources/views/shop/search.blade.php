@section('title', $search . ' | HopeXito')
<x-app-layout>
    <div class="relative z-20 min-h-screen px-1 mx-auto mt-6 pb-28 max-w-7xl">
        <div class="flex gap-2">
            <p class="tracking-widest text-indigo-400">"{{ $search }}"</p>
            <p class="">{{ $search_count }} Results</p>
        </div>
        <div class="grid grid-cols-2 gap-2 mt-8 sm:grid-cols-3 lg:grid-cols-4 md:gap-6">
            @foreach ($products as $product)
            <a href="{{ route('product.show', $product->slug) }}" x-data="{ open: false }">
                <div
                    class="relative p-1 transition shadow-lg cursor-pointer group rounded-xl hover:shadow-fuchsia-500/50 bg-white/5 backdrop-filter backdrop-blur-3xl">
                    <div class="w-full overflow-hidden rounded-lg min-h-75" x-on:mouseenter="open = true"
                        x-on:mouseleave="open = false">
                        @if ($product->product_image_2)
                            <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                                x-show="open == false" class="w-full h-full transition ease-in-out rounded-t-lg">

                            <img x-cloak src="{{ $product->product_image_2 }}" alt="{{ $product->title }}"
                                x-show="open == true" class="w-full h-full transition ease-in-out rounded-t-lg">
                        @else
                            <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                                class="w-full h-full transition ease-in-out rounded-t-lg">
                        @endif
                    </div>
                    <div class="flex flex-col justify-between px-2 py-1 tracking-wider md:px-4 md:py-2">
                        @if($product->category == 'Shirt')
                        <p class="px-3 py-0.5 bg-fuchsia-700/80 rounded-md w-fit text-xs">Standard Tee</p>
                        @elseif($product->category == 'Oversized')
                        <p class="px-3 py-0.5 rounded-md bg-indigo-700/80 w-fit text-xs">Oversized Tee</p>
                        @else
                        <p></p>
                        @endif
                        <div class="text-sm text-white truncate md:font-medium mt-1">
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
    </div>
</x-app-layout>
