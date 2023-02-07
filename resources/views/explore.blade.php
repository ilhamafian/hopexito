@section('title', 'Explore | HopeXito')
<x-app-layout>
    <div class="flex flex-col items-center max-w-xl min-h-screen gap-12 pb-48 mx-auto lg:flex-row lg:max-w-7xl">
        <div class="flex flex-col p-4 space-y-2">
            <x-jet-title>Discover Unique Art from Independent Artists</x-jet-title>
            <p class="px-2 pb-6 lg:pb-10">Shop custom designs featuring independent artists. Find unique art to match your style
                and support
                talent.</p>
            <div class="text-center w-96">
                <a href="{{ route('shop.all') }}"
                    class="w-full relative p-0.5 inline-flex items-center justify-center font-bold overflow-hidden group rounded-md">
                    <span
                        class="w-full h-full bg-gradient-to-br from-[#ff8a05] via-[#ff5478] to-[#ff00c6] group-hover:from-[#ff00c6] group-hover:via-[#ff5478] group-hover:to-[#ff8a05] absolute"></span>
                    <span
                        class="relative w-full p-4 transition-all ease-out rounded-md bg-zinc-900 group-hover:bg-opacity-0 duration-400">
                        <span class="relative text-lg text-pink-400 group-hover:text-white">Shop Now</span>
                    </span>
                </a>
            </div>
        </div>
        <div class="">
            <img class="w-full shadow-lg shadow-purple-500 rounded-3xl" src="image/surface-pro.png" />
        </div>
    </div>
    <x-jet-gradient-card>
        <div class="relative h-[700px] flex items-center bg-black rounded-xl">
            <img src="image/doodle.png" class="absolute hidden w-60 h-60 top-8 left-8 lg:block" />
            <img src="image/doodle-2.png" class="absolute hidden h-48 W-48 bottom-4 left-96 lg:block" />
            <div class="mx-auto max-w-[1240px] px-4 sm:px-6 sm:py-24 lg:mr-0 lg:pl-8 lg:pr-0">
                <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-3 lg:items-center lg:gap-x-16">
                    <div class="max-w-xl text-center sm:text-left">
                        <x-jet-title>Featured Artist</x-jet-title>

                        <p class="mt-4">
                            Find inspiration and bring personality to your space with pieces from our Featured Artists
                            Shop. Shop the works of some of the most talented artists and make a statement with every
                            purchase.
                        </p>

                        <div class="hidden lg:mt-8 lg:flex lg:gap-4">
                            <button
                                class="p-3 text-indigo-500 transition border-2 rounded-full prev-button border-violet-500 hover:bg-violet-500 hover:text-white">
                                <span class="sr-only">Previous Slide</span>
                                <svg class="w-5 h-5 transform -rotate-180" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" />
                                </svg>
                            </button>

                            <button
                                class="p-3 text-indigo-500 transition border-2 rounded-full next-button border-violet-500 hover:bg-violet-500 hover:text-white">
                                <span class="sr-only">Next Slide</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="-mx-6 lg:col-span-2 lg:mx-0">
                        <div class="swiper-container !overflow-hidden">
                            <div class=" swiper-wrapper">
                                @foreach ($users as $user)
                                    <a href="{{ route('people', $user->name) }}" class="swiper-slide">
                                        <blockquote class=" h-96 w-[480px] group ">
                                            <div class="absolute z-40 overflow-hidden rounded-lg">
                                                <div class="flex flex-col">
                                                    @if ($user->artist->cover_image)
                                                        <img src="{{ asset('storage/cover-image/' . $user->artist->cover_image) }}"
                                                            alt="{{ $user->artist->title }}" class="w-[480px] h-64">
                                                    @else
                                                        <img src="/image/cover-image.png" alt=""
                                                            class="object-cover w-full h-full transition duration-1000 ease-in-out hover:scale-125">
                                                    @endif
                                                </div>
                                                <img class="absolute left-0 right-0 object-cover w-16 h-16 m-auto rounded-full bottom-20"
                                                    src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                                <div
                                                    class="flex flex-col items-center px-8 py-8 tracking-wider bg-neutral-900">
                                                    <p class="font-medium text-white truncate">
                                                        {{ $user->name }}
                                                    <p class="text-sm text-gray-400 hover:text-cyan-500">
                                                        {{ $user->products->count() }} Designs
                                                    </p>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center gap-4 mt-8 lg:hidden">
                    <button aria-label="Previous slide"
                        class="p-3 text-indigo-500 transition border-2 rounded-full prev-button border-violet-500 hover:bg-violet-500 hover:text-white">
                        <svg class="w-5 h-5 transform -rotate-180" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>

                    <button aria-label="Next slide"
                        class="p-3 text-indigo-500 transition border-2 rounded-full next-button border-violet-500 hover:bg-violet-500 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Swiper('.swiper-container', {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 32,
                    autoplay: {
                        delay: 8000,
                    },
                    breakpoints: {
                        640: {
                            centeredSlides: true,
                            slidesPerView: 1.25,
                        },
                        1024: {
                            centeredSlides: true,
                            slidesPerView: 1.5,
                        },
                    },
                    navigation: {
                        nextEl: '.next-button',
                        prevEl: '.prev-button',
                    },
                })
            })
        </script>
    </x-jet-gradient-card>
    <div class="min-h-screen px-2 bg-gradient-to-b from-neutral-900 via-purple-900/40 to-indigo-900/70 md:px-28 pt-28">
        <x-jet-title>Featured Products</x-jet-title>
        <div class="grid grid-cols-2 gap-2 mx-auto mt-6 md:gap-6 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $product)
                <a href="{{ route('product.show', $product->slug) }}">
                    <div
                        class="relative p-1 transition shadow-lg cursor-pointer group rounded-xl hover:shadow-fuchsia-500/50 bg-white/5 backdrop-filter backdrop-blur-3xl">
                        <div class="w-full overflow-hidden rounded-lg min-h-75">
                            <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                                class="w-full h-full transition ease-in-out rounded-t-lg hover:scale-125">
                        </div>
                        <div class="flex flex-col justify-between px-2 py-1 tracking-wider md:px-4 md:py-2">
                            <div class="text-sm text-white truncate md:font-medium">
                                {{ $product->title }}
                            </div>
                            <h2 class=" hover:text-fuchsia-500">By {{ $product->shopname }}
                            </h2>
                            <h2 class="m-1 text-lg text-center md:m-2 text-fuchsia-500">
                                RM{{ number_format($product->price, 2) }}</h2>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="min-h-screen px-2 bg-gradient-to-b from-indigo-900/70 via-violet-900/40 to-black/50 md:px-28 pt-28">
        <x-jet-title>Explore Designers Collection</x-jet-title>
        <div class="grid grid-cols-1 gap-2 mt-6 lg:grid-cols-2 md:gap-12">
            @foreach ($collections as $item)
                <div class="relative">
                    <img src="{{ asset('storage/collection-image/' . $item->collection_image) }}"
                        class="w-full h-full rounded-lg shadow-lg" />
                    <div class="absolute bottom-0 p-1 rounded-lg md:bottom-3 md:left-12 bg-white/20">
                        <div class="flex gap-2 md:gap-8">
                            @foreach ($item->product->slice(0, 2) as $product)
                                <a href="{{ route('product.show', $product->slug) }}" class="">
                                    <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                                        class="w-64 rounded-lg ">
                                </a>
                            @endforeach
                        </div>
                        <div class="hidden p-4 mt-4 transition bg-black rounded-lg shadow-lg hover:shadow-fuchsia-500/4 sm:block">
                            <div class="flex justify-between">
                                {{ $item->title }}
                                <div class="flex items-center gap-2">
                                    See more
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
