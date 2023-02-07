@section('title', 'Sell Your Art | HopeXito')
<x-app-layout>
    {{-- hero section --}}
    <div class="relative z-20 w-full sm:min-h-screen min-h-[500px]">
        <div
            class="grid grid-cols-1 max-w-6xl h-[380px] sm:h-[500px] mx-auto bg-black/30 mt-16 shadow-md backdrop-filter backdrop-blur-3xl rounded-2xl shadow-rose-500">
            <div class="max-w-4xl py-24 sm:py-40 mx-auto text-center text-white ">
                <div class="sm:h-12 h-8">
                    <span x-data="{ texts: ['We Turn Art Into Product', 'We Bring Creativity To Life'] }" x-typewriter.3s="texts"
                        class="text-2xl font-bold tracking-wider text-transparent sm:text-3xl md:text-5xl bg-clip-text bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"></span>
                </div>
                <div class="max-w-2xl mx-auto">
                    <p class="px-2 py-2 sm:py-4 text-white sm:px-12 sm:text-sm leading-5 ">Sell your art printed on
                        high-quality products to a nationwide audience. You design, we settle the rest, and you get
                        paid! It's easy and quick to get started.</p>
                </div>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->role_id == 3)
                            <form action="{{ route('upgrade', Auth::user()->id) }}" method="post">
                                @csrf
                                <x-jet-button-custom type="submit" class="mt-4">
                                    Start selling
                                </x-jet-button-custom>
                            </form>
                        @endauth
                    @else
                        <x-jet-button-custom onclick="window.location='{{ route('register') }}'" class="mt-4">
                            Get Started
                        </x-jet-button-custom>
                    @endif
                @endif
            </div>
        </div>
    </div>
    {{-- gradient blob components --}}
    <div
        class="absolute z-10 rounded-full md:block filter blur-xl bg-gradient-to-br from-rose-500 to-violet-500 md:h-56 md:w-56 w-24 h-24 top-40 -right-12 xl:right-40 animate-spin">
    </div>
    <div
        class="absolute z-10 md:w-72 md:h-72 w-32 h-32 rounded-full filter blur-xl bg-gradient-to-br from-fuchsia-500 to-indigo-500 md:bottom-32 xl:left-44 top-96 -left-12 animate-spin">
    </div>
    {{-- how it works section --}}
    <div class="min-h-screen bg-black/20 flex items-center text-white">
            <div class="px-5 mx-auto py-16 sm:py-0">
                <x-jet-title>
                    <p class="text-center"> How It Works </p>
                </x-jet-title>
                <div class="flex flex-wrap mt-12 tracking-wider text-center">
                    <div class="p-4 xl:w-1/4 md:w-1/2">
                        <div class="p-6 shadow-md rounded-xl h-72 bg-black/30 shadow-rose-500">
                            <lord-icon src="https://cdn.lordicon.com/vpzjmdjv.json" trigger="loop"
                                colors="primary:#f43f5e,secondary:#6366f1" style="width:150px;height:150px">
                            </lord-icon>
                            <p class="py-2">Upload your design to the template, set your own retail prices, and then
                                save it for
                                others to purchase.</p>
                        </div>
                    </div>
                    <div class="p-4 xl:w-1/4 md:w-1/2">
                        <div class="p-6 shadow-md rounded-xl h-72 bg-black/30 shadow-rose-500">
                            <lord-icon src="https://cdn.lordicon.com/wgydzbzz.json" trigger="loop"
                                colors="primary:#f43f5e,secondary:#6366f1" style="width:150px;height:150px">
                            </lord-icon>
                            <p class="py-2">Someone on the internet will discover and purchase products they love,
                                featuring your designs</p>
                        </div>
                    </div>
                    <div class="p-4 xl:w-1/4 md:w-1/2">
                        <div class="p-6 shadow-md rounded-xl h-72 bg-black/30 shadow-rose-500">
                            <lord-icon src="https://cdn.lordicon.com/hgvwxhhl.json" trigger="loop"
                                colors="primary:#f43f5e,secondary:#6366f1" state="loop"
                                style="width:150px;height:150px">
                            </lord-icon>
                            <p class="py-2">We take care of your orders from A to Z, products are produced to order
                                and shipped nationwide.</p>
                        </div>
                    </div>
                    <div class="p-4 xl:w-1/4 md:w-1/2">
                        <div class="p-6 shadow-md rounded-xl h-72 bg-black/30 shadow-rose-500">
                            <lord-icon src="https://cdn.lordicon.com/aloksxkv.json" trigger="loop"
                                colors="primary:#f43f5e,secondary:#6366f1" style="width:150px;height:150px">
                            </lord-icon>
                            <p class="py-2">Customers receive high-quality products, and you receive a cut for it.</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    {{-- products preview section --}}
    <div class="relative min-h-screen flex items-center">
        <div>
            <img src="image/shirts-background.png" alt="" class="absolute inset-0 object-cover w-full h-full" />
            <div
                class="absolute inset-0 w-full h-full opacity-80 bg-gradient-to-r from-rose-900 via-fuchsia-900 to-indigo-900">
            </div>
        </div>
        <div class="relative flex flex-col lg:flex-row items-center mx-auto max-w-7xl bg-black/60 py-20 rounded-xl">
            <div class="w-1/2 md:px-20 px-2 text-white">
                <x-jet-title>Your designs on variety of apparels</x-jet-title>
                <p class="pt-4">
                    Your artistic creations can be showcased on an extensive collection of products, including stylish
                    t-shirts, cozy hoodies, and trendy oversized t-shirts.
                </p>
                <div class="pt-8 flex lg:mt-0 float-right">
                    <button
                        class="prev-button-2 rounded-full border-2 border-violet-500 p-3 text-indigo-500 hover:bg-violet-500 hover:text-white transition"">
                        <span class="sr-only">Previous Slide</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -rotate-180 transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <button
                        class="next-button-2 ml-3 rounded-full border-2 border-violet-500 p-3 text-indigo-500 hover:bg-violet-500 hover:text-white transition"">
                        <span class="sr-only">Next Slide</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="w-1/2 py-6">
                <div class="-mx-6 mt-8 lg:col-span-2 lg:mx-0">
                    <div class="swiper-container-2 !overflow-hidden">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide w-96 h-96 rounded-lg">
                                <img src="image/sellyourart/shirt.png" class="h-full w-full" />
                            </div>
                            <div class="swiper-slide w-96 h-96 rounded-lg">
                                <img src="image/sellyourart/hoodie.png" class="h-full w-full" />
                            </div>

                            <div class="swiper-slide w-96 h-96 rounded-lg">
                                <img src="image/sellyourart/long-sleeve.png" class="h-full w-full" />
                            </div>

                            <div class="swiper-slide w-96 h-96 rounded-lg">
                                <img src="image/sellyourart/oversized.png" class="h-full w-full" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- seller preview section --}}
    <div class="min-h-screen flex items-center">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:mr-0 lg:pl-8 lg:pr-0">
            <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-3 lg:items-center lg:gap-x-16">
                <div class="relative max-w-xl text-center sm:text-left">
                    <img src="image/flash.png" class="absolute -translate-x-64 -translate-y-24 rotate-6 w-56 h-56" />
                    <x-jet-title class="text-2xl">Join a community of successful designers</x-jet-title>
                    <p class="mt-4 text-white">
                        The HopeXito marketplace is powered by its talented designers, ranging from professionals to
                        hobbyists and even fans with creative ideas. Join these designers as they generate income daily
                        on the platform.
                    </p>

                    <div class="hidden lg:mt-8 lg:flex lg:gap-4">
                        <button
                            class="prev-button rounded-full border-2 border-violet-500 p-3 text-indigo-500 hover:bg-violet-500 hover:text-white transition">
                            <span class="sr-only">Previous Slide</span>
                            <svg class="h-5 w-5 -rotate-180 transform" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" />
                            </svg>
                        </button>

                        <button
                            class="next-button rounded-full border-2 border-violet-500 p-3 text-indigo-500 hover:bg-violet-500 hover:text-white transition">
                            <span class="sr-only">Next Slide</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="lg:col-span-2 lg:mx-0">
                    <div class="swiper-container !overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($sellers as $seller)
                                <div class="swiper-slide text-center">
                                    <div class="bg-cover p-2 rounded-xl h-72"
                                        style="background-image: url({{ asset('storage/cover-image/' . $seller->artist->cover_image) }})">
                                        <div class="py-14 bg-black/60 transition rounded-lg space-y-2 h-full">
                                            <img class="object-cover w-16 h-16 m-auto rounded-full bottom-20"
                                                src="{{ $seller->profile_photo_url }}" alt="{{ $seller->name }}" />
                                            <p class="text-xl text-white pb-4">{{ $seller->name }}</p>
                                            <a href="{{ route('people', $seller->name) }}">
                                                <x-jet-button-custom>
                                                    Visit Shop
                                                </x-jet-button-custom>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 flex justify-center gap-4 lg:hidden">
                <button aria-label="Previous slide"
                    class="prev-button rounded-full border border-pink-600 p-4 text-pink-600 hover:bg-pink-600 hover:text-white">
                    <svg class="h-5 w-5 -rotate-180 transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>

                <button aria-label="Next slide"
                    class="next-button rounded-full border border-pink-600 p-4 text-pink-600 hover:bg-pink-600 hover:text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="h-[500px] bg-black/50 text-white">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg text-center">
                <x-jet-title>Kickstart your journey</x-jet-title>
            </div>
            <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <a class="block rounded-xl border border-gray-800 p-8 shadow-xl transition hover:border-pink-500 hover:shadow-pink-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-pink-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                      </svg>
                      

                <h2 class="mt-4 text-xl font-bold text-pink-500">Free of Charge</h2>
                <p class="mt-1">Free to use platform for designers to sell art and earn income.
                </p>
            </a>
                <a class="block rounded-xl border border-gray-800 p-8 shadow-xl transition hover:border-pink-500 hover:shadow-pink-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-pink-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                      </svg>
                    <h2 class="mt-4 text-xl font-bold text-pink-500">Flexibility</h2>
                    <p class="mt-1">
                        Complete control over your income, with the convenience of flexible pricing options.
                    </p>
                </a>
                <a class="block rounded-xl border border-gray-800 p-8 shadow-xl transition hover:border-pink-500 hover:shadow-pink-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-pink-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                      </svg>
                    <h2 class="mt-4 text-xl font-bold text-pink-500">Safety</h2>
                    <p class="mt-1">
                        Ensuring the protection of your designs through anti-piracy and watermark features.
                    </p>
                </a>
                <a class="block rounded-xl border border-gray-800 p-8 shadow-xl transition hover:border-pink-500 hover:shadow-pink-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-pink-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                      </svg>

                    <h2 class="mt-4 text-xl font-bold text-pink-500">Support</h2>

                    <p class="mt-1">
                        Your customers' satisfaction is ensured with 24/7 availability of top-notch support.
                    </p>
                </a>
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
                    delay: 3000,
                },
                breakpoints: {
                    640: {
                        centeredSlides: true,
                        slidesPerView: 1.25,
                    },
                    1024: {
                        centeredSlides: false,
                        slidesPerView: 1.5,
                    },
                },
                navigation: {
                    nextEl: '.next-button',
                    prevEl: '.prev-button',
                },
            })
        })
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.swiper-container-2', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 32,
                autoplay: {
                    delay: 5000,
                },
                breakpoints: {
                    640: {
                        centeredSlides: true,
                        slidesPerView: 1.25,
                    },
                    1024: {
                        centeredSlides: false,
                        slidesPerView: 1.5,
                    },
                },
                navigation: {
                    nextEl: '.next-button-2',
                    prevEl: '.prev-button-2',
                },
            })
        })
    </script>
    </div>
    {{-- cta get started section --}}
    <div class="relative bg-black/50 h-72 w-full py-24">
        <img src="image/abstract-shape.png" class="absolute left-24 bottom-14 hidden lg:block w-48 h-48 rotate-180" />
        <img src="image/abstract-shape-2.png" class="absolute right-8 bottom-14 hidden lg:block w-72 h-72" />
        <div class="max-w-2xl mx-auto text-center">
            <h1
                class="mb-6 text-3xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-fuchsia-500 to-fuchsia-500">
                Are you ready to start?</h1>
            <a href="{{ route('register') }}">
                <x-jet-button-custom>Get Started</x-jet-button-custom>
            </a>
        </div>
    </div>
    <x-jet-section-border />
</x-app-layout>
