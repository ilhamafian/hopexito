@if (session()->has('message'))
    <div class="fixed z-50 inline-flex items-center transition duration-500 rounded-full top-14 lg:top-20 right-2 xl:top-24 xl:right-24"
        role="alert" x-data="{ open: true }" x-bind:class="open ? '' : 'opacity-0'" x-init="() => { setTimeout(() => { open = false }, 3000); }"
        x-delay="1000">
        <div class="relative p-0.5 inline-flex items-center justify-center overflow-hidden group rounded-md">
            <span
                class="w-full h-full bg-gradient-to-br from-[#ff8a05] via-[#ff5478] to-[#ff00c6] group-hover:from-[#ff00c6] group-hover:via-[#ff5478] group-hover:to-[#ff8a05] absolute"></span>
            <span
                class="relative px-6 py-3 transition-all ease-out rounded-md bg-neutral-900 group-hover:bg-opacity-0 duration-400">
                <span class="relative tracking-wider text-white">{{ session('message') }}</span>
            </span>
        </div>
    </div>   
@endif
