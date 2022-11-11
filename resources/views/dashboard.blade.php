<x-app-layout>
    <div class="min-h-screen text-white bg-black bg-cover"
        style="background-image:url('image/frame.png')">
        <div class="mx-auto shadow-md backdrop-filter backdrop-blur-xl md:w-3/4 rounded-xl shadow-indigo-500">
            <div class="flex justify-between px-6 pt-8 mx-auto lg:w-3/4">
                <h1
                    class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-rose-500 to-blue-500">
                    Dashboard</h1>
                <div class="relative group">
                    <div
                        class="absolute transition rounded-full opacity-50 -inset-1 bg-gradient-to-r from-rose-500 to-indigo-500 blur group-hover:opacity-100">
                    </div>
                    <a href="{{ route('product.create') }}"
                        class="relative float-right px-4 py-2 text-lg text-white bg-black rounded-full">Add New Work</a>
                </div>
            </div>
            <section class="flex justify-content-center">
                <div class="flex flex-wrap mx-auto my-12 lg:flex-nowrap h-96">
                    <div class="flex w-full">
                        <div
                            class="relative flex flex-col items-start m-1 transition-all duration-300 ease-in-out delay-150 transform shadow-sm bg-zinc-900 rounded-xl lg:w-80 lg:-mr-16 lg:hover:-translate-x-16 lg:hover:-translate-y-8 hover:bg-gradient-to-tr from-black to-indigo-900">
                            <div class="px-6 py-6 cursor-default">
                                <h4 class="mt-4 text-2xl font-semibold">
                                    <img src="image\dashboard-card1.png" class="w-16 h-16 mb-4 rounded-xl">
                                    <span class="text-slate-300">Create product</span>
                                </h4>
                                <p class="mt-4 text-base font-normal text-gray-300 leading-relax">Upload your art &
                                    choose products. More choices for customers means more chances to sell.</p>
                            </div>
                            <a href="{{ route('product.index') }}"
                                class="flex px-12 text-sm text-gray-400 transition hover:underline hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                Add designs
                            </a>
                        </div>
                    </div>
                    <div class="flex w-full">
                        <div
                            class="relative flex flex-col items-start m-1 transition duration-300 ease-in-out delay-150 transform shadow-sm bg-neutral-900 rounded-xl lg:w-80 lg:-mr-16 lg:hover:-translate-x-16 lg:hover:-translate-y-8 hover:bg-gradient-to-tr from-black to-violet-900">
                            <div class="px-6 py-6 cursor-default">
                                <h4 class="mt-4 text-2xl font-semibold">
                                    <img src="image\dashboard-card2.png" class="w-16 h-16 mb-4 rounded-xl">
                                    <span class="text-slate-300">Set up shop</span>
                                </h4>
                                <p class="mt-4 text-base font-normal text-gray-300 leading-relax">Customize your shop so
                                    it's more memorable and engaging. Make it truly unique.</p>
                            </div>
                            <a href="{{ route('profile.show') }}"
                                class="flex px-12 py-1 text-sm text-gray-400 transition hover:underline hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                Add an avatar
                            </a>
                            <a href="{{ route('profile.show') }}#add-cover-image"
                                class="flex px-12 py-1 text-sm text-gray-400 transition hover:underline hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                Add a cover image
                            </a>
                            <a href="{{ route('profile.show') }}#add-cover-image"
                                class="flex px-12 py-1 text-sm text-gray-400 transition hover:underline hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                Add a social link
                            </a>
                        </div>
                    </div>
                    <div class="flex w-full">
                        <div
                            class="relative flex flex-col items-start m-1 transition duration-300 ease-in-out delay-150 transform shadow-sm bg-stone-900 rounded-xl lg:w-80 lg:hover:-translate-x-16 lg:hover:-translate-y-8 hover:bg-gradient-to-tr from-black to-purple-900">
                            <div class="px-6 py-6 cursor-default">
                                <h4 class="mt-4 text-2xl font-semibold">
                                    <img src="image\dashboard-card3.png" class="w-16 h-16 mb-4 rounded-xl">
                                    <span class="text-slate-300">Get paid</span>
                                </h4>
                                <p class="mt-4 text-base font-normal text-gray-300 leading-relax">Confirm your account
                                    and payment details to open your shop and get selling.</p>
                            </div>
                            <a href="{{ route('profile.show') }}"
                                class="flex px-12 py-1 text-sm text-gray-400 transition hover:underline hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                Confirm your email
                            </a>
                            <a href="{{ route('profile.show') }}#add-cover-image"
                                class="flex px-12 py-1 text-sm text-gray-400 transition hover:underline hover:text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                Add payment details
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
