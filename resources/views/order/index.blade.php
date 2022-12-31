<x-app-layout>
    <div class="block mx-auto w-max-7xl">
        <h1>Your Orders</h1>
        <p>Check the status of recent orders, manage returns. and discover similar products.</p>
        @foreach ($order as $order)
            <div class="flex justify-between">
                <p>Order: #{{ $order->billplz_id }}</p>
                <p>Ordered on: <b>{{ $order->created_at }}</b></p>
                <p>Total Amount: RM{{ $order->amount }}</p>
                @foreach ($order->productOrder as $item)
                    <section class="text-gray-600 body-font">
                        <div class="container flex flex-wrap px-5 py-24 mx-auto">
                            <div class="flex flex-wrap -m-4">
                                <div class="p-4 lg:w-1/2 md:w-full">
                                    <div
                                        class="flex flex-col p-8 border-2 border-gray-200 border-opacity-50 rounded-lg sm:flex-row">
                                        <div
                                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mb-4 text-indigo-500 bg-indigo-100 rounded-full sm:mr-8 sm:mb-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-8 h-8"
                                                viewBox="0 0 24 24">
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-grow">
                                            <h2 class="mb-3 text-lg font-medium text-gray-900 title-font">Shooting Stars
                                            </h2>
                                            <p class="text-base leading-relaxed">Blue bottle crucifix vinyl post-ironic
                                                four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                                            <a class="inline-flex items-center mt-3 text-indigo-500">Learn More
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                                    viewBox="0 0 24 24">
                                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 lg:w-1/2 md:w-full">
                                    <div
                                        class="flex flex-col p-8 border-2 border-gray-200 border-opacity-50 rounded-lg sm:flex-row">
                                        <div
                                            class="inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mb-4 text-indigo-500 bg-indigo-100 rounded-full sm:mr-8 sm:mb-0">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" class="w-10 h-10"
                                                viewBox="0 0 24 24">
                                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </div>
                                        <div class="flex-grow">
                                            <h2 class="mb-3 text-lg font-medium text-gray-900 title-font">The Catalyzer
                                            </h2>
                                            <p class="text-base leading-relaxed">Blue bottle crucifix vinyl post-ironic
                                                four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                                            <a class="inline-flex items-center mt-3 text-indigo-500">Learn More
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                                    viewBox="0 0 24 24">
                                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
                {{-- <div>
                    <p>{{ $item->price }}</p>
                    <p>{{ $item->quantity }}</p>
                    <p>{{ $item->size }}</p>
                    <p>{{ $item->color }}</p>
                </div> --}}
            </div>
        @endforeach
    </div>
</x-app-layout>
