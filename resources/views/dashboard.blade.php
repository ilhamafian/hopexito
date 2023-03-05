@section('title', 'Artist Dashboard | HopeXito')
<x-app-layout>
    <x-jet-session-message />
    <div class="relative z-20 min-h-screen pt-8">
        <div
            class="max-w-6xl mx-auto shadow-md backdrop-filter backdrop-blur-3xl rounded-3xl bg-black/30 shadow-fuchsia-500">
            <div class="flex flex-col items-center justify-between max-w-5xl px-6 pt-8 mx-auto sm:flex-row">
                <h1
                    class="text-3xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-fuchsia-500 to-fuchsia-500">
                    Dashboard</h1>
                <div class="relative group">
                    <div
                        class="absolute inset-0 hidden transition rounded-full opacity-50 md:block group-hover:-inset-1 bg-gradient-to-r from-indigo-600 via-purple-600 to-fuchsia-600 blur group-hover:opacity-100">
                    </div>
                    <a href="{{ route('product.create') }}"
                        class="hidden lg:block relative float-right px-5 py-2.5 mt-4 tracking-widest text-white rounded-full bg-neutral-900 sm:mt-0">Add
                        New
                        Product</a>
                </div>
            </div>
            <div class="grid max-w-5xl grid-cols-1 gap-4 py-16 mx-auto text-white md:grid-cols-3">
                <div class="block mx-2 h-96 group sm:mx-0">
                    <div
                        class=" relative flex flex-col space-y-3 h-full rounded-3xl border-4 border-indigo-500 bg-black/40 p-8 transition group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#ec4899]">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/edxgdhxu.json" trigger="loop" delay="2000"
                                colors="primary:#6366f1,secondary:#e879f9" state="hover-1" class="w-32 h-32">
                            </lord-icon>
                        </div>
                        <p class="my-3 text-lg text-indigo-400">Create product</p>
                        <p class="">Upload your art & choose products. More choices for customers means more
                            chances to sell.</p>
                        <a href="{{ route('product.create') }}"
                            class="flex items-center mt-2 text-sm text-indigo-300 transition hover:text-pink-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            Add designs
                        </a>
                    </div>
                </div>
                <div class="block mx-2 h-96 group sm:mx-0">
                    <div
                        class=" relative flex flex-col h-full rounded-3xl border-4 border-indigo-500 bg-black/40 p-8 transition group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#ec4899]">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/vqrsuymp.json" trigger="loop" delay="2000"
                                colors="primary:#6366f1,secondary:#e879f9" class="w-32 h-32">
                            </lord-icon>
                        </div>
                        <p class="my-3 text-lg text-indigo-400">Setup Shop</p>
                        <p class="">Customize your shop so it's more memorable and engaging. Make it truly unique.
                        </p>

                        <a href="{{ route('profile.show') }}"
                            class="flex items-center mt-2 text-sm text-indigo-300 transition hover:text-pink-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            Add an avatar
                        </a>
                        <a href="{{ route('profile.show') }}"
                            class="flex items-center text-sm text-indigo-300 transition hover:text-pink-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            Add a cover image
                        </a>
                        <a href="{{ route('profile.show') }}"
                            class="flex items-center text-sm text-indigo-300 transition hover:text-pink-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            Add a social link
                        </a>
                    </div>
                </div>
                <div class="block mx-2 h-96 group sm:mx-0">
                    <div
                        class=" relative flex flex-col h-full rounded-3xl border-4 border-indigo-500 bg-black/40 p-8 transition group-hover:-translate-x-2 group-hover:-translate-y-2 group-hover:shadow-[8px_8px_0_0_#ec4899]">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/nqwqiffl.json" trigger="loop" delay="2000"
                                colors="primary:#6366f1,secondary:#e879f9" class="w-32 h-32">
                            </lord-icon>
                        </div>
                        <p class="my-3 text-lg text-indigo-400">Get Paid</p>
                        <p class="">Confirm your account
                            and payment details to open your shop and get selling.</p>

                        <a href="{{ route('profile.show') }}"
                            class="flex items-center mt-2 text-sm text-indigo-300 transition hover:text-pink-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            Confirm your email address
                        </a>
                        <a href="#wallet"
                            class="flex items-center text-sm text-indigo-300 transition hover:text-pink-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            Add payment details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div
        class="absolute z-10 hidden rounded-full md:block filter blur-xl bg-gradient-to-r from-indigo-500 via-violet-500 to-fuchsia-500 h-72 w-72 bottom-48 right-36 animate-spin">
    </div>
    <div
        class="absolute z-10 hidden rotate-45 rounded-full h-80 w-80 md:block filter blur-xl bg-gradient-to-r from-indigo-700 via-violet-700 to-fuchsia-700 bottom-16 left-36 animate-spin">
    </div>
    <div class="mb-48" id="wallet">
        @livewire('wallet')
    </div>
    <div class="relative w-full py-16 bg-black/50 h-72">
        <img src="image/discord-icon.png" class="absolute hidden left-0 xl:left-48 -top-16 lg:block -rotate-12" />
        <img src="image/xito-icon.png" class="absolute hidden w-32 h-32 lg:right-16 xl:right-72 bottom-12 lg:block rotate-12" />
        <div class="max-w-2xl mx-auto space-y-2 text-center">
            <h1
                class="text-3xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-fuchsia-500 to-fuchsia-500">
                Join Our Discord Community</h1>
            <p class="pb-6 text-white">Join the designers online community on our Discord server and be a part of the <span class="px-1 uppercase bg-indigo-500">hope</span></p>
            <a href="https://discord.gg/AZu2ngA4uk" target="_blank">
                <x-jet-button-custom>Join HopeXito Designers Club</x-jet-button-custom>
            </a>
        </div>
    </div>
    <x-jet-section-border />
</x-app-layout>
