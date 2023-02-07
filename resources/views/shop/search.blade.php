@section('title', $search . ' | HopeXito')
<x-app-layout>
    <div class="relative z-20 min-h-screen px-1 mx-auto mt-6 pb-28 max-w-7xl">
        <div class="flex gap-2">
            <p class="tracking-widest text-indigo-400">"{{ $search }}"</p>
            <p class="">{{ $search_count }} Results</p>
        </div>
        <div class="grid grid-cols-2 gap-2 mt-8 sm:grid-cols-3 lg:grid-cols-4 md:gap-6">
            @foreach ($products as $product)
            <a href="{{ route('product.show', $product->slug) }}">
                <div
                    class="relative p-1 transition shadow-lg cursor-pointer group rounded-xl hover:shadow-fuchsia-500/50 bg-white/5 backdrop-filter backdrop-blur-3xl">
                    <div class="w-full overflow-hidden rounded-t-lg min-h-75">
                        <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                            class="w-full h-full transition ease-in-out rounded-t-lg hover:scale-125">
                    </div>
                    <div class="flex flex-col justify-between px-2 py-1 tracking-wider md:px-4 md:py-2">
                        <div class="font-medium text-white truncate">
                            {{ $product->title }}
                        </div>
                        <h2 class="text-sm text-gray-400 hover:text-fuchsia-500">By {{ $product->shopname }}
                        </h2>
                        <h2 class="m-2 text-lg text-center text-fuchsia-500">
                            RM{{ number_format($product->price, 2) }}</h2>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </div>
</x-app-layout>
