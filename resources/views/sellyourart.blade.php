<x-app-layout>
    {{-- Hero Section --}}
    <div class="relative z-50 w-full">
        <div
            class="flex flex-row w-3/4 mx-auto mt-12 mb-24 shadow-md backdrop-filter backdrop-blur-3xl rounded-2xl bg-black bg-opacity-30 shadow-rose-500">
            <div class="w-1/2 py-48 text-center">
                <h3 class="py-2 text-2xl font-bold text-white">With Creativity, Comes Easy Money.</h3>
                <p class="py-4 text-white lg:px-10">Sell your art printed on high-quality products to a global
                    audience. It's fun, easy, and quick to get started.</p>
                <div class="relative m-auto mt-6 group w-44">
                    <div
                        class="transition duration-200 rounded-full opacity-50 -inset-1 bg-gradient-to-r from-rose-500 to-blue-500 blur group-hover:opacity-100">
                    </div>
                    <x-jet-button onclick="window.location='{{ route('register') }}'" type="button" class="py-4 rounded-full">
                        Start Selling
                    </x-jet-button>
                </div>
            </div>
            <div class="w-1/2">

            </div>
        </div>
    </div>
    <div
        class="absolute z-10 rounded-full filter blur-xl bg-gradient-to-br from-rose-500 to-violet-500 h-72 w-72 top-40 right-40 animate-spin">
    </div>
    <div
        class="absolute z-10 w-48 h-48 rounded-full filter blur-xl bg-gradient-to-br from-fuchsia-500 to-indigo-500 bottom-20 left-36 animate-spin">
    </div>
    <div class="bg-zinc-900">
        <section class="text-gray-600 body-font">
            <div class="container flex flex-wrap px-5 py-24 mx-auto">
                <div class="relative flex pb-8 mx-auto sm:items-center md:w-2/3">
                    <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                        <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div
                        class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white rounded-full sm:mt-0 bg-rose-500 title-font">
                        1</div>
                    <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-indigo-500 bg-indigo-100 rounded-full">
                            <lord-icon src="https://cdn.lordicon.com/vtpxjewg.json" trigger="loop" stroke="50"
                                colors="primary:#ec4899,secondary:#6366f1" style="width:70px;height:70px;">
                            </lord-icon>
                        </div>
                        <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                            <h2 class="mb-1 text-xl font-medium text-gray-100 title-font">Upload</h2>
                            <p class="leading-relaxed">You upload your designs to products in your shop</p>
                        </div>
                    </div>
                </div>
                <div class="relative flex pb-8 mx-auto sm:items-center md:w-2/3">
                    <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                        <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div
                        class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white rounded-full sm:mt-0 bg-rose-500 title-font">
                        2</div>
                    <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-indigo-500 bg-indigo-100 rounded-full">
                            <lord-icon src="https://cdn.lordicon.com/yrxnwkni.json" trigger="loop" stroke="50"
                                colors="primary:#f43f5e,secondary:#6366f1" style="width:70px;height:70px">
                            </lord-icon>
                        </div>
                        <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                            <h2 class="mb-1 text-xl font-medium text-gray-100 title-font">Get featured</h2>
                            <p class="leading-relaxed">Customers find and purchase products they love, featuring your
                                designs</p>
                        </div>
                    </div>
                </div>
                <div class="relative flex pb-8 mx-auto sm:items-center md:w-2/3">
                    <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                        <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div
                        class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white rounded-full sm:mt-0 bg-rose-500 title-font">
                        3</div>
                    <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-indigo-500 bg-indigo-100 rounded-full">
                            <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                            <lord-icon src="https://cdn.lordicon.com/hgvwxhhl.json" trigger="loop" stroke="50"
                                colors="primary:#ec4899,secondary:#6366f1" style="width:70px;height:70px">
                            </lord-icon>
                        </div>
                        <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                            <h2 class="mb-1 text-xl font-medium text-gray-100 title-font">Delivery</h2>
                            <p class="leading-relaxed">Products are produced to delivered.</p>
                        </div>
                    </div>
                </div>
                <div class="relative flex mx-auto sm:items-center md:w-2/3">
                    <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                        <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                    </div>
                    <div
                        class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white rounded-full sm:mt-0 bg-rose-500 title-font">
                        4</div>
                    <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-indigo-500 bg-indigo-100 rounded-full">
                            <lord-icon src="https://cdn.lordicon.com/gowrcrni.json" trigger="loop" stroke="50"
                                colors="primary:#f43f5e,secondary:#6366f1" style="width:70px;height:70px">
                            </lord-icon>
                        </div>
                        <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                            <h2 class="mb-1 text-xl font-medium text-gray-100 title-font">Get Paid</h2>
                            <p class="leading-relaxed">Customers get an awesome product, and you get paid</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
