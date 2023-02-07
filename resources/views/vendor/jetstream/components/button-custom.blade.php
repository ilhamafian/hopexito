<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            'relative inline-flex items-center justify-center px-6 py-3 overflow-hidden font-bold text-white rounded-md shadow-2xl group',
    ]) }}>
    <span
        class="absolute inset-0 w-full h-full transition duration-300 ease-out opacity-0 bg-gradient-to-br from-pink-600 via-purple-700 to-blue-500 group-hover:opacity-100"></span>
    <!-- Top glass gradient -->
    <span class="absolute top-0 left-0 w-full bg-gradient-to-b from-white/5 to-transparent h-1/3"></span>
    <!-- Bottom gradient -->
    <span class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-white/5 to-transparent"></span>
    <!-- Left gradient -->
    <span class="absolute bottom-0 left-0 w-4 h-full bg-gradient-to-r from-white/5 to-transparent"></span>
    <!-- Right gradient -->
    <span class="absolute bottom-0 right-0 w-4 h-full bg-gradient-to-l from-white/5 to-transparent"></span>
    <span class="absolute inset-0 w-full h-full border border-white rounded-md opacity-10"></span>
    <span
        class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-full group-hover:h-56 opacity-5"></span>
    <span
        class="relative font-sans font-semibold tracking-widest text-white uppercase text-xs">{{ $slot }}</span>
</button>
