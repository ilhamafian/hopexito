<x-app-layout>
    <div class="h-96 w-full bg-gray-500 p-2">
        <div class="bg-black h-52 relative">
            <img class="rounded-full absolute m-auto w-20 h-20 left-0 right-0 -bottom-8 object-cover"
                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
        </div>
        <div class="text-center mt-10">
            <p class="text-xl font-bold">{{ Auth::user()->name }}</p>
            <p>Joined {{ Auth::user()->created_at->format('M Y') }}</p>
            <p>{{ $products->count() }} Designs</p>

        </div>
    </div>
    <div class="grid lg:grid-cols-4 gap-6 mx-16">
        @foreach ($products as $product)
            <a href="{{ route('product.show', $product->id) }}">
                <div class="mt-12 transition duration-500 shadow-sm cursor-pointer hover:scale-105">
                    <img class="border-2 border-indigo-500 shadow-md rounded-3xl shadow-pink-500"
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
</x-app-layout>
