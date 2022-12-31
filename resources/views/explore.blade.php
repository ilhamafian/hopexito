<x-app-layout>
    <div class="flex">
        @if (Route::has('login'))
            @auth
                @if (Auth::user()->role_id == 1)
                    <x-jet-admin-sidebar></x-jet-admin-sidebar>
                @endif
            @endauth
        @endif
        <div class="w-full px-2 py-16 mx-auto sm:py-24 sm:px-6 lg:max-w-7xl lg:px-2">
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
                                <h2 class="text-sm text-gray-400 hover:text-cyan-500">By {{ $product->shopname }}
                                </h2>
                                <h2 class="m-2 text-lg text-center text-fuchsia-500">
                                    RM{{ number_format($product->price, 2) }}</h2>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
