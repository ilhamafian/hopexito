<button {{ $attributes->merge(['type' => 'button', 'class' => 
    'inline-flex items-center 
    px-4 py-2 
    bg-violet-500 
    border border-transparent 
    rounded-md font-sans
    font-semibold text-xs text-white uppercase tracking-widest
    hover:bg-fuchsia-500 transition' ]) }}>
    {{ $slot }}
</button>