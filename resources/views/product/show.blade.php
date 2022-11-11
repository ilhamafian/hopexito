<x-app-layout>
    <div class="flex w-3/4 mx-auto">
        <div class="flex flex-col w-1/2">
            <div class="max-w-md">
                <div class="flex items-center text-sm pt-9">
                    <span class="text-white">Hope Irui&nbsp;</span>
                    <span class="text-white">/ BlACK CLOVER Magna</span>
                </div>
                <div class="pt-10">
                    <h1 class="text-white text-4xl font-bold tracking-wide">{{ $product->title }}</h1>
                </div>
                <div class="flex items-center justify-between pt-4">
                    <span class="text-white text-3xl">RM{{ number_format($product->price, 2) }}</span>
                </div>
                <div>
                    <p class="text-white pt-8 leading-relaxed">The gently curved lines accentuated by sewn details are
                        kind to your body and
                        pleasant look at. Also, there's a tilt and height-adjustment mechanism.
                    </p>
                </div>
                <div class="flex pt-8 space-x-4">
                    <button class="w-5 h-5 rounded-full bg-[#58737d] hover:ring-4 hover:ring-white" />
                    <button class="w-5 h-5 rounded-full bg-[#545454] hover:ring-4 hover:ring-white" />
                    <button class="w-5 h-5 rounded-full bg-[#58737d] hover:ring-4 hover:ring-white" />
                    <button class="w-5 h-5 rounded-full bg-[#CBA5A5] hover:ring-4 hover:ring-white" />
                </div>
                <div class="flex space-x-6 pt-9">
                    <div class="flex items-center border rounded-sm border-white">
                        <button class="text-white p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                        <p class="text-white w-16 h-full text-center outline-none p-4">1</p>
                        <button class="text-white p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                        </button>
                    </div>
                    <button
                        class="py-4 text-sm font-bold text-white uppercase bg-rose-500 rounded-sm px-14 hover:bg-rose-600">
                        Add to Cart
                    </button>
                </div>
                <div class="text-white pt-8">
                    100% Cotton | Regular Fit | Non-Refundable
                </div>
            </div>
        </div>
        <div class="relative flex flex-col items-end w-1/2">
            <div class="flex items-start pr-20 space-x-2">
                <span class="text-3xl font-bold leading-tight text-white">01</span>
                <span class="text-xl text-white">/ 02</span>
            </div>
            <div class="flex pr-10 space-x-16">
                <button class="p-3 text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button class="p-3 text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
            <div class="px-16">
                <img class="rounded-3xl"
                    src="{{ $product->front_shirt }}" alt="" />
            </div>


        </div>
    </div>
</x-app-layout>
