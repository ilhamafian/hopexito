<x-app-layout>
    <div class="flex">
        <x-jet-admin-sidebar>

        </x-jet-admin-sidebar>
        <div class="w-full bg-no-repeat bg-cover" style="background-image: url('/image/admin-dashboard.jpg')">
            <div class="flex flex-col min-h-screen p-8 space-y-4 bg-black rounded-md bg-opacity-40">
                <div
                    class="p-4 shadow-lg bg-clip-padding backdrop-filter backdrop-blur-md bg-white/10 rounded-xl shadow-indigo-500/50">
                    <h2 class="text-xl tracking-wider text-white">List of Artists</h2>
                    <div class="flex gap-4 mt-4">
                        @foreach ($artists as $artist)
                            <a href="{{ route('people', $artist->name) }}">
                                <img class="object-cover w-20 h-20 transition rounded-full shadow-lg hover:scale-105 hover:shadow-indigo-500/50 "
                                    src="{{ $artist->profile_photo_url }}" alt="{{ $artist->name }}" />
                            </a>
                        @endforeach
                    </div>
                </div>
                <div
                    class="p-4 shadow-lg rounded-xl bg-clip-padding backdrop-filter backdrop-blur-md bg-white/10 shadow-indigo-500/50">
                    <h2 class="text-xl tracking-wider text-white">List of New Designs</h2>
                    <div class="flex gap-4 mt-4">
                        @foreach ($products as $product)
                            <div>
                                <a href="{{ route('product.show', $product->id) }}">
                                    <img class="w-48 p-2 transition shadow-lg hover:scale-105 hover:shadow-black/50"
                                        src="{{ asset('storage/image-front/' . $product->image_front) }}"
                                        alt="{{ $product->name }}" />
                                </a>
                                <p class="mt-4 text-center text-white">{{ $product->shopname }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
