<div x-cloak x-show="modal == true" @keydown.escape.prevent.stop="modal = false" class="fixed inset-0 z-50">
    <!-- Overlay -->
    <div x-show="modal" x-transition.opacity class="fixed inset-0 bg-black/80 rounded-xl">
    </div>
    <!-- Panel -->
    <div x-show="modal" x-transition @click="modal = false"
        class="relative flex items-center justify-center w-full h-full">
        <div @click.stop style="max-height: 80vh"
            class="z-20 flex w-full p-8 px-12 overflow-y-auto border-2 border-indigo-500 shadow-md md:w-1/2 xl:w-1/3 bg-zinc-900 rounded-2xl shadow-rose-500/50">
            {{ $slot }}
        </div>
    </div>
</div>