<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-stone-600 rounded-lg font-semibold text-white uppercase tracking-widest hover: transition']) }}>
    {{ $slot }}
</button>
