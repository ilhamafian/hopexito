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
                <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                    <x-jet-header>Storage Optimization</x-jet-header>
                    <div class="p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                        <x-jet-button-utility wire:click="clearCache">
                            Clear Image Cache
                        </x-jet-button-utility>
                        {{-- <x-jet-button-utility wire:click="clearMoreCache">
                            Deep Cleaning
                        </x-jet-button-utility> --}}
                    </div>
                </div>
            </x-jet-gradient-card>
            <x-jet-gradient-card>
                <div class="flex flex-col p-6 bg-black rounded-xl">
                    <x-jet-header>Wallet Master</x-jet-header>
                    <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                        <x-jet-input type="text" name="artist_id" class="block w-full mb-2" wire:model="artist_id"/>
                        <x-jet-button-utility wire:click="addWallet()">
                            Add Wallet To User
                        </x-jet-button-utility>
                    </div>
                </div>
            </x-jet-gradient-card>
            <x-jet-gradient-card>
                <div class="flex flex-col p-6 bg-black rounded-xl">
                    <x-jet-header>Fix Name</x-jet-header>
                    <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                        <x-jet-input type="text" name="name" class="mb-2" wire:model="name"/>
                        <x-jet-input type="text" name="newName" class="mb-2" wire:model="newName"/>
                        <x-jet-button-utility wire:click="fixName()">
                            Fix Artist Name
                        </x-jet-button-utility>
                    </div>
                </div>
            </x-jet-gradient-card>
            <x-jet-gradient-card>
                <div class="flex flex-col p-6 bg-black rounded-xl">
                    <x-jet-header>Order Master</x-jet-header>
                    <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                        <x-jet-input type="text" name="order_id" class="block w-full mb-2" wire:model="order_id"/>
                        <x-jet-button-utility wire:click="deleteOrder()">
                            Delete Order
                        </x-jet-button-utility>
                    </div>
                </div>
            </x-jet-gradient-card>
        </div>
    </x-jet-admin-layout>
</div>
