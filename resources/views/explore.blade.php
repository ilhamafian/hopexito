<x-app-layout>
    <div class="grid lg:grid-cols-4 gap-6 mx-16">
        @foreach ($products as $product)
            <a href="{{ route('product.show', $product->id) }}">
                <div class="mt-12 transition duration-500 shadow-sm cursor-pointer hover:scale-105">
                    <img class="border-2 border-indigo-500 rounded-3xl "
                        src="{{ $product->front_shirt }}">
                    <div class="p-1 mt-4 text-center text-md">
                        <div class="font-bold text-white truncate">
                            {{ $product->title }}
                        </div>
                        <h2 class="text-gray-400 hover:text-cyan-500">By {{ $product->shopname }}</h2>
                        <h2 class="m-2 text-lg text-pink-500">RM{{ number_format($product->price, 2) }}</h2>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    @foreach ($artists as $artist)
    {{ $artist->name }}
    @endforeach
</x-app-layout>