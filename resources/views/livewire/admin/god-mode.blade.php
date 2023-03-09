<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div x-data="{ password: '' }">
            <div x-show="password = '{{  }}'">
                <x-jet-session-message />
                <div class="grid grid-cols-2 text-white">
                    <x-jet-gradient-card>
                        <div class="flex flex-col p-6 bg-black rounded-xl">
                            <x-jet-header>Fortune Fountain</x-jet-header>
                            <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                                <x-jet-button-utility wire:click="add20">
                                    Magic Button 20
                                </x-jet-button-utility>
                                <x-jet-button wire:click="minus20">
                                    Curse Button 20
                                </x-jet-button>
                            </div>
                        </div>
                    </x-jet-gradient-card>
                    <x-jet-gradient-card>
                        <div class="flex flex-col p-6 bg-black rounded-xl">
                            <x-jet-header>Rune Reduction</x-jet-header>
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
                            <x-jet-header>Nuclear Bomb</x-jet-header>
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
                            <x-jet-header>Chief Finance Sorcerer</x-jet-header>
                            <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                                <x-jet-input type="text" name="artist_id" class="block w-full mb-2"
                                    wire:model="artist_id" />
                                <x-jet-button-utility wire:click="addWallet()">
                                    Add Wallet To User
                                </x-jet-button-utility>
                            </div>
                        </div>
                    </x-jet-gradient-card>
                    <x-jet-gradient-card>
                        <div class="flex flex-col p-6 bg-black rounded-xl">
                            <x-jet-header>Doppelganger</x-jet-header>
                            <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                                <x-jet-input type="text" name="name" class="mb-2" wire:model="name" />
                                <x-jet-input type="text" name="newName" class="mb-2" wire:model="newName" />
                                <x-jet-button-utility wire:click="fixName()">
                                    Fix Artist Name
                                </x-jet-button-utility>
                            </div>
                        </div>
                    </x-jet-gradient-card>
                    <x-jet-gradient-card>
                        <div class="flex flex-col p-6 bg-black rounded-xl">
                            <x-jet-header>The Annihilator</x-jet-header>
                            <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                                <x-jet-input type="text" name="order_id" class="block w-full mb-2"
                                    wire:model="order_id" />
                                <x-jet-button-utility wire:click="deleteOrder()">
                                    Delete Order
                                </x-jet-button-utility>
                            </div>
                        </div>
                    </x-jet-gradient-card>
                    <x-jet-gradient-card>
                        <div class="flex flex-col p-6 bg-black rounded-xl">
                            <x-jet-header>Cosmic Controller</x-jet-header>
                            <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                                <x-jet-input type="text" name="order_id" class="block w-full mb-2"
                                    wire:model="order_id" placeholder="id" />
                                <x-jet-input type="text" name="collection_id" class="block w-full mb-2"
                                    wire:model="collection_id" placeholder="collection id" />
                                <x-jet-input type="text" name="email" class="block w-full mb-2" wire:model="email"
                                    placeholder="email" />
                                <x-jet-input type="text" name="order_name" class="block w-full mb-2"
                                    wire:model="order_name" placeholder="name" />
                                <x-jet-input type="text" name="description" class="block w-full mb-2"
                                    wire:model="description" placeholder="description" />
                                <x-jet-input type="text" name="delivery" class="block w-full mb-2"
                                    wire:model="delivery" placeholder="delivery" />
                                <x-jet-input type="text" name="status" class="block w-full mb-2" wire:model="status"
                                    placeholder="status" />
                                <x-jet-input type="text" name="amount" class="block w-full mb-2" wire:model="amount"
                                    placeholder="amount" />
                                <x-jet-input type="text" name="tracking_number" class="block w-full mb-2"
                                    wire:model="tracking_number" placeholder="tracking number" />
                                <x-jet-input type="text" name="paid" class="block w-full mb-2" wire:model="paid"
                                    placeholder="paid" />
                                <x-jet-input type="date" name="paid_at" class="block w-full mb-2"
                                    wire:model="paid_at" />
                                <x-jet-input type="text" name="address" class="block w-full mb-2"
                                    wire:model="address" placeholder="address" />
                                <x-jet-input type="text" name="postcode" class="block w-full mb-2"
                                    wire:model="postcode" placeholder="postcode" />
                                <x-jet-input type="text" name="state" class="block w-full mb-2"
                                    wire:model="state" placeholder="state" />
                                <x-jet-button-utility wire:click="submitOrder()">
                                    Submit Order
                                </x-jet-button-utility>
                            </div>
                        </div>
                    </x-jet-gradient-card>
                    <x-jet-gradient-card>
                        <div class="flex flex-col p-6 bg-black rounded-xl h-full">
                            <x-jet-header>Stock Strategist</x-jet-header>
                            <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                                <x-jet-input type="text" name="product_order_id" class="block w-full mb-2"
                                    wire:model="product_order_id" placeholder="id" />
                                <x-jet-input type="text" name="billplz_id" class="block w-full mb-2"
                                    wire:model="billplz_id" placeholder="billplz id" />
                                <x-jet-input type="text" name="product_id" class="block w-full mb-2"
                                    wire:model="product_id" placeholder="product id" />
                                <x-jet-input type="text" name="title" class="block w-full mb-2"
                                    wire:model="title" placeholder="title" />
                                <x-jet-input type="text" name="price" class="block w-full mb-2"
                                    wire:model="price" placeholder="price" />
                                <x-jet-input type="text" name="quantity" class="block w-full mb-2"
                                    wire:model="quantity" placeholder="quantity" />
                                <x-jet-input type="text" name="size" class="block w-full mb-2"
                                    wire:model="size" placeholder="size" />
                                <x-jet-input type="text" name="color" class="block w-full mb-2"
                                    wire:model="color" placeholder="color" />
                                <x-jet-button-utility wire:click="submitProductOrder()">
                                    Submit Product
                                </x-jet-button-utility>
                            </div>
                        </div>
                    </x-jet-gradient-card>
                    <x-jet-gradient-card>
                        <div class="flex flex-col p-6 bg-black h-full rounded-xl">
                            <x-jet-header>Transaction Titan</x-jet-header>
                            <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                                <x-jet-input type="text" name="user_id" class="block w-full mb-2"
                                    wire:model="user_id" placeholder="id" />
                                <x-jet-input type="text" name="wallet_id" class="block w-full mb-2"
                                    wire:model="wallet_id" placeholder="wallet id" />
                                <x-jet-input type="text" name="transaction_balance" class="block w-full mb-2"
                                    wire:model="transaction_balance" placeholder="balance" />
                                <x-jet-input type="text" name="income" class="block w-full mb-2"
                                    wire:model="income" placeholder="income" />
                                <x-jet-input type="text" name="new_balance" class="block w-full mb-2"
                                    wire:model="new_balance" placeholder="new balance" />
                                <x-jet-input type="text" name="transaction_status" class="block w-full mb-2"
                                    wire:model="transaction_status" placeholder="status" />
                                <x-jet-button-utility wire:click="submitTransaction()">
                                    Add Transaction
                                </x-jet-button-utility>
                            </div>
                        </div>
                    </x-jet-gradient-card>

                    <x-jet-gradient-card>
                        <div class="flex flex-col p-6 bg-black rounded-xl h-full">
                            <x-jet-header>The Ultimate Hope</x-jet-header>
                            <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                                <x-jet-input type="text" name="wallet_user_id" class="block w-full mb-2"
                                    wire:model="wallet_user_id" />
                                <x-jet-input type="text" name="commission" class="block w-full mb-2"
                                    wire:model="commission" />
                                <x-jet-input type="text" name="balance" class="block w-full mb-2"
                                    wire:model="balance" />
                                <x-jet-button-utility wire:click="updateWallet()">
                                    HXPE
                                </x-jet-button-utility>
                            </div>
                        </div>
                    </x-jet-gradient-card>
                    <x-jet-gradient-card>
                        <div class="flex flex-col p-6 bg-black rounded-xl h-full">
                            <x-jet-header>Mastermind of the Matrix</x-jet-header>
                            <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                                <x-jet-input type="text" name="superadmin_name" class="block w-full mb-2"
                                    wire:model="superadmin_name" />
                                <x-jet-input type="text" name="superadmin_email" class="block w-full mb-2"
                                    wire:model="superadmin_email" />
                                <x-jet-input type="text" name="super_password" class="block w-full mb-2"
                                    wire:model="super_password" />
                                <x-jet-button-utility wire:click="createSuperadmin()">
                                    rothschild
                                </x-jet-button-utility>
                            </div>
                        </div>
                    </x-jet-gradient-card>
                </div>
            </div>
            <div x-show="password !== ''">
                <input x-model="password" type="password" class="border rounded px-2 py-1">
                <button class="bg-blue-500 text-white px-4 py-1 rounded"
                    @click="password === 'superadmin-password' ? $refs.superadmin.focus() : ''">Enter</button>
            </div>
            <input x-ref="superadmin" type="text" class="sr-only">
        </div>

    </x-jet-admin-layout>
</div>
