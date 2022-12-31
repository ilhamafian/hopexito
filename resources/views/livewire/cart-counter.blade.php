@if (Auth::check())
    <x-jet-nav-link href="{{ route('cart.index') }}" :active="request()->routeIs('cart')" class="">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>
        <div class="absolute w-6 h-4 text-xs font-bold text-center bg-indigo-500 rounded-full bottom-1 right-3 ">
            {{ $cart_count }}
        </div>
    </x-jet-nav-link>
@else
    <button class="relative px-4 py-2 text-white rounded-full hover:text-indigo-300" wire:click="showModal"
        wire:loading.attr="disabled">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="z-0 w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
        </svg>
        <div class="absolute z-0 w-6 h-4 text-xs font-bold text-center bg-indigo-500 rounded-full bottom-1 right-3 ">
            {{ $cart_count }}
        </div>
    </button>
    <x-jet-dialog-modal wire:model="showingModal">
        <x-slot name="content">
            <x-jet-login-modal></x-jet-login-modal>
        </x-slot>
    </x-jet-dialog-modal>
@endif
