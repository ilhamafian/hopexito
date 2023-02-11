<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <x-jet-session-message />
        <div class="grid grid-cols-2 text-white">
            <x-jet-gradient-card>
                <div class="flex flex-col p-6 bg-black rounded-xl">
                    <x-jet-header>Give Bonus to Artist</x-jet-header>
                    <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                        <x-jet-button-utility wire:click="add20">
                            Magic Button 20
                        </x-jet-button-utility>
                    </div>
                </div>
            </x-jet-gradient-card>
            <x-jet-gradient-card>
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
            </x-jet-gradient-card>
            <x-jet-gradient-card>
                <div class="flex flex-col p-6 bg-black rounded-xl">
                    <x-jet-header>Advance Settings</x-jet-header>
                    <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                        <x-jet-button-utility wire:click="clearCache">
                            Clear Image Cache
                        </x-jet-button-utility>
                    </div>
                </div>
            </x-jet-gradient-card>
        </div>
    </x-jet-admin-layout>
</div>
