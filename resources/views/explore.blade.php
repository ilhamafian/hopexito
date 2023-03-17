@section('title', 'Explore | HopeXito')
<x-app-layout>
    <div class="flex flex-col items-center min-h-screen gap-12 pb-28 mx-auto lg:flex-row lg:max-w-5xl xl:max-w-7xl">
        <div class="flex flex-col px-12 lg:px-0 py-16 lg:py-0 space-y-2 text-center lg:text-left">
            <x-jet-title>Discover Unique Art from Independent Artists</x-jet-title>
            <p class="px-2 lg:px-0 pb-6 lg:pb-10 max-w-md mx-auto lg:mx-0">Shop custom designs featuring independent
                artists. Find unique art to match your style
                and support
                talent.</p>
            <div class="text-center w-96 mx-auto lg:mx-0">
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
            <img class="max-w-2xl shadow-lg shadow-purple-500 rounded-3xl" src="image/surface-pro.png" />
        </div>
    </div>
    <x-jet-gradient-card>
        <div class="relative h-[700px] flex items-center bg-black rounded-xl">
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
                                                            class="object-cover w-[480px] h-64 transition duration-1000 ease-in-out hover:scale-125">
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
        <div class="grid grid-cols-2 gap-2 mx-auto mt-6 md:gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
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
    <div class=" min-h-screen px-2 bg-gradient-to-b from-indigo-900/70 via-violet-900/40 to-black/50 xl:px-28 pt-28">
        <x-jet-title>Explore Designers Collection</x-jet-title>
        <div class="grid grid-cols-1 gap-2 mt-6 lg:grid-cols-2 xl:gap-12">
            @foreach ($collections as $item)
                <div class="relative rounded-xl ">
                    <img src="{{ asset('storage/collection-image/' . $item->collection_image) }}"
                        class="z-0 absolute lg:inset-y-2 xl:inset-y-6 rounded-xl xl:h-96 lg:h-80 w-full" />
                    <div class="z-50 relative p-1 lg:m-4 xl:m-10 rounded-lg top-0 bg-white/20">
                        <div class="flex gap-2 md:gap-8">
                            @foreach ($item->product->slice(0, 2) as $product)
                                <a href="{{ route('product.show', $product->slug) }}" class="group"
                                    x-data="{ open: false }" x-on:mouseenter="open = true"
                                    x-on:mouseleave="open = false">
                                    @if ($product->product_image_2)
                                        <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                                            x-show="open == false" class="w-64 lg:h-56 xl:h-64 rounded-lg ">
                                        <img x-cloak src="{{ $product->product_image_2 }}"
                                            alt="{{ $product->title }}" x-show="open == true"
                                            class="w-64 lg:h-56 xl:h-64 rounded-lg ">
                                    @else
                                        <img src="{{ $product->product_image }}" alt="{{ $product->title }}"
                                            class="w-64 lg:h-56 xl:h-64 rounded-lg ">
                                    @endif
                                </a>
                            @endforeach
                        </div>
                        <div
                            class="p-4 mt-4 transition bg-black rounded-lg shadow-lg hover:shadow-fuchsia-500/4 group">
                            <a href="{{ route('people', $item->name) }}"
                                class="flex justify-between px-4 group-hover:text-indigo-400">
                                {{ $item->title }}
                                <div class="flex items-center gap-3">
                                    View Shop
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 group-hover:translate-x-3 transition">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <x-jet-button-custom class="w-full mt-4 h-14"
            onclick="window.location.href='{{ route('shop.collection') }}'">
            Discover More Collections
        </x-jet-button-custom>
    </div>
</x-app-layout>
