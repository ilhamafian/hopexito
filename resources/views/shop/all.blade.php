@section('title', 'Shop Unique Art | HopeXito')
<x-app-layout>
    <div class="relative z-20 grid min-h-screen grid-cols-2 gap-2 px-1 mx-auto mt-6 pb-28 md:gap-6 sm:grid-cols-3 lg:grid-cols-4 max-w-7xl">
        @foreach ($products as $product)
        <a href="{{ route('product.show', $product->slug) }}" x-data="{ open: false }">
            <div
                class="relative p-1 transition shadow-lg cursor-pointer group rounded-xl hover:shadow-fuchsia-500/50 bg-white/5 backdrop-filter backdrop-blur-3xl">
                <div class="w-full overflow-hidden rounded-lg min-h-75" x-on:mouseenter="open = true"
                    x-on:mouseleave="open = false">
                    @if ($product->product_image_2)
                        <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                            x-show="open == false" class="w-full h-full transition ease-in-out rounded-t-lg">

                        <img src="{{ $product->product_image_2 }}" alt="{{ $product->title }}"
                            x-show="open == true" class="w-full h-full transition ease-in-out rounded-t-lg">
                    @else
                        <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                            class="w-full h-full transition ease-in-out rounded-t-lg">
                    @endif
                </div>
                <div class="flex flex-col justify-between px-2 py-1 tracking-wider md:px-4 md:py-2">
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
    <div class="mx-auto mb-20 max-w-7xl">
        {{ $products->links('/vendor/pagination/tailwind') }}
    </div>

</x-app-layout>
