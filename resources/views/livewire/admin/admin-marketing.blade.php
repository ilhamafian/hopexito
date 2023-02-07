<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>

        <x-jet-session-message />
        <div class="grid grid-cols-2 gap-12 text-white">
            <div class="p-1 rounded-2xl bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                <div class="flex flex-col p-6 bg-black rounded-xl">
                    <x-jet-header>Give Bonus to Artist</x-jet-header>
                    <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                        <x-jet-button-utility wire:click="add20">
                            Magic Button 20
                        </x-jet-button-utility>
                    </div>
                </div>
            </div>
            <div class="p-1 rounded-2xl bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                <div class="flex flex-col p-6 bg-black rounded-xl">
                    <x-jet-header>Set Discount for Products</x-jet-header>
                    <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                        <x-jet-button-utility wire:click="discount15">
                            Sacred Button 15
                        </x-jet-button-utility>
                        <x-jet-button wire:click="revertPromo">
                            Revert Promo
                        </x-jet-button>
                    </div>
                </div>
            </div>
        </div>
    </x-jet-admin-layout>
</div>
