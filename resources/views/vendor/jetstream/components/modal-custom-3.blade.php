<div x-cloak x-show="modal3 == true" @keydown.escape.prevent.stop="modal3 = false" class="fixed inset-0 z-50">
    <!-- Overlay -->
    <div x-show="modal3" x-transition.opacity class="fixed inset-0 bg-black/80 rounded-xl">
    </div>
    <!-- Panel -->
    <div x-show="modal3" x-transition @click="modal3 = false"
        class="relative flex items-center justify-center w-full h-full">
        <div @click.stop style="max-height: 80vh"
            class="z-20 flex w-full p-4 md:p-8 px-6 overflow-y-auto border-2 border-indigo-500 shadow-md md:w-1/2 bg-zinc-900 rounded-2xl shadow-rose-500/50">
            {{ $slot }}
        </div>
    </div>
</div>