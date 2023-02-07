@section('title', 'Choose Product | HopeXito')
<x-app-layout>
    <x-jet-session-message />
    <div class="relative z-20 min-h-screen pt-8">
        <img src="../image/product-selection/product-selection.jpg"
            class="absolute inset-0 hidden w-full h-full bg-cover lg:block" />
        <div
            class="max-w-6xl mx-auto shadow-md backdrop-filter backdrop-blur-[6px] rounded-3xl bg-black/40 shadow-fuchsia-500">
            <div class="max-w-5xl px-6 pt-8 mx-auto sm:flex-row">
                <h1
                    class="text-3xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-fuchsia-500 to-fuchsia-500">
                    Products Selection</h1>
            </div>
            <div class="grid max-w-5xl grid-cols-1 gap-4 py-16 mx-auto text-white md:grid-cols-3">
                <div class="block h-48 mx-2 group sm:mx-0">
                    <a href="{{ route('product.template', 1) }}"
                        class=" relative flex flex-col items-center h-full rounded-3xl border-4 border-indigo-500 bg-black/40 p-8 transition group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#ec4899]">
                        <p class="my-3 text-lg text-indigo-400">T-Shirt</p>
                        <img src="../image/product-selection/tshirt.png"
                            class="w-16 h-16 p-2 bg-indigo-500 rounded-full" />
                    </a>
                </div>
                <div class="block h-48 mx-2 group sm:mx-0">
                    <a href="{{ route('product.template', 2) }}"
                        class=" relative flex flex-col items-center h-full rounded-3xl border-4 border-indigo-500 bg-black/40 p-8 transition group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#ec4899]">
                        <p class="my-3 text-lg text-indigo-400">Totebag</p>
                        <img src="../image/product-selection/totebag.png"
                            class="w-16 h-16 p-2 bg-indigo-500 rounded-full" />
                        <p class="absolute px-2 uppercase rounded-md bg-rose-500/90 bottom-14">Coming Soon</p>
                    </a>
                </div>
                <div class="block h-48 mx-2 group sm:mx-0">
                    <div
                        class=" relative flex flex-col items-center h-full rounded-3xl border-4 border-indigo-500 bg-black/40 p-8 transition group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#ec4899]">
                        <p class="my-3 text-lg text-indigo-400">Oversized T-Shirt</p>
                        <img src="../image/product-selection/oversized.png"
                            class="w-16 h-16 p-2 bg-indigo-500 rounded-full" />
                        <p class="absolute px-2 uppercase rounded-md bg-rose-500/90 bottom-14">Coming Soon</p>
                    </div>
                </div>
                <div class="block h-48 mx-2 group sm:mx-0">
                    <div
                        class=" relative flex flex-col items-center h-full rounded-3xl border-4 border-indigo-500 bg-black/40 p-8 transition group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#ec4899]">
                        <p class="my-3 text-lg text-indigo-400">Hoodie</p>
                        <img src="../image/product-selection/hoodie.png"
                            class="w-16 h-16 p-2 bg-indigo-500 rounded-full" />
                        <p class="absolute px-2 uppercase rounded-md bg-rose-500/90 bottom-14">Coming Soon</p>
                    </div>
                </div>
                <div class="block h-48 mx-2 group sm:mx-0">
                    <div
                        class=" relative flex flex-col items-center h-full rounded-3xl border-4 border-indigo-500 bg-black/40 p-8 transition group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#ec4899]">
                        <p class="my-3 text-lg text-indigo-400">Sweater</p>
                        <img src="../image/product-selection/sweater.png"
                            class="w-16 h-16 p-2 bg-indigo-500 rounded-full" />
                        <p class="absolute px-2 uppercase rounded-md bg-rose-500/90 bottom-14">Coming Soon</p>
                    </div>
                </div>
                <div class="block h-48 mx-2 group sm:mx-0">
                    <div
                        class=" relative flex flex-col items-center h-full rounded-3xl border-4 border-indigo-500 bg-black/40 p-8 transition group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#ec4899]">
                        <p class="my-3 text-lg text-indigo-400">Sublimation</p>
                        <img src="../image/product-selection/jersey.png"
                            class="w-16 h-16 p-2 bg-indigo-500 rounded-full" />
                        <p class="absolute px-2 uppercase rounded-md bg-rose-500/90 bottom-14">Coming Soon</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
