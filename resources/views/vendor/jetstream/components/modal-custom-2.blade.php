<div x-cloak x-show="modal2 == true" @keydown.escape.prevent.stop="modal2 = false" class="fixed inset-0 z-50">
    <!-- Overlay -->
    <div x-show="modal2" x-transition.opacity class="fixed inset-0 bg-black/80 rounded-xl">
    </div>
    <!-- Panel -->
    <div x-show="modal2" x-transition @click="modal2 = false"
        class="relative flex items-center justify-center w-full h-full">
        <div @click.stop style="max-height: 80vh"
            class="z-20 flex w-full p-8 px-12 overflow-y-auto border-2 border-indigo-500 shadow-md md:w-2/3 bg-zinc-900 rounded-2xl shadow-rose-500/50">
            {{ $slot }}
        </div>
    </div>
</div>