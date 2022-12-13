<button {{ $attributes->merge(['type' => 'submit', 'class' => 
    'inline-flex items-center
    px-4 py-2 
    bg-rose-500 
    border border-transparent 
    rounded-md
    font-semibold text-xs text-white uppercase tracking-widest
    hover:bg-indigo-500 transition
    focus:ring focus:ring-rose-500 focus:bg-transparent']) }}>
    {{ $slot }}
</button>