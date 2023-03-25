<div class="relative w-full bg-fixed bg-cover select-text">
    <x-jet-session-message />
    <div class="max-h-screen p-10 overflow-scroll bg-black/30">
        {{ $slot }}
    </div>
</div>