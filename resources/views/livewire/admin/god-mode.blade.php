<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <x-jet-session-message />
        {{-- @if(!$hide)
        <div class="max-w-xl min-h-screen mx-auto">
            <x-jet-input type="password" wire:model.lazy="unlock_password" class="block w-full mt-32 "/>
            <x-jet-button wire:click="unlock()" class="w-full mt-4"><span class="mx-auto">Apocalypse Dragon</span></x-jet-button>
        </div>
        @endif
        @if ($hide) --}}
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
                    <div class="flex flex-col p-6 bg-black rounded-xl">
                        <x-jet-header>The Annihilator</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                            <x-jet-input type="text" class="block w-full mb-2"
                                wire:model="order_id" placeholder="order id" />
                            <x-jet-button-utility wire:click="deleteOrder()">
                                Obliterator
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
              
                <x-jet-gradient-card>
                    <div class="flex flex-col p-6 bg-black rounded-xl">
                        <x-jet-header>Chief Finance Sorcerer</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                            <x-jet-input type="text" class="block w-full mb-2"
                                wire:model="artist_id" placeholder="user id" />
                            <x-jet-button-utility wire:click="addWallet()">
                                Mystic Ledger 
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
                <x-jet-gradient-card>
                    <div class="flex flex-col p-6 bg-black rounded-xl">
                        <x-jet-header>Doppelganger</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                            <x-jet-input type="text" class="mb-2" wire:model="name" placeholder="outdated name"/>
                            <x-jet-input type="text" class="mb-2" wire:model="newName" placeholder="latest name"/>
                            <x-jet-button-utility wire:click="fixName()">
                                Juxtapose
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
                <x-jet-gradient-card>
                    <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                        <x-jet-header>Unforgivable Curses</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                            <x-jet-input type="text" name="verify_user_id" class="block w-full mb-2"
                                wire:model="verify_user_id" placeholder="user id"/>
                            <x-jet-button-utility wire:click="verifyUser()">
                                Avada Kedavra
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
               
                <x-jet-gradient-card>
                    <div class="flex flex-col row-span-2 p-6 bg-black rounded-xl">
                        <x-jet-header>Cosmic Controller</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                            <x-jet-input type="text" name="order_id" class="block w-full mb-2" wire:model="order_id"
                                placeholder="billplz id" />
                            <x-jet-input type="text" name="collection_id" class="block w-full mb-2"
                                wire:model="collection_id" placeholder="collection id" />
                            <x-jet-input type="text" name="email" class="block w-full mb-2" wire:model="email"
                                placeholder="email" />
                            <x-jet-input type="text" name="order_name" class="block w-full mb-2"
                                wire:model="order_name" placeholder="name" />
                            <x-jet-input type="text" name="description" class="block w-full mb-2"
                                wire:model="description" placeholder="description" />
                            <x-jet-input type="text" name="delivery" class="block w-full mb-2" wire:model="delivery"
                                placeholder="delivery" />
                            <x-jet-input type="text" name="status" class="block w-full mb-2" wire:model="status"
                                placeholder="status" />
                            <x-jet-input type="text" name="amount" class="block w-full mb-2" wire:model="amount"
                                placeholder="amount" />
                            <x-jet-input type="text" name="tracking_number" class="block w-full mb-2"
                                wire:model="tracking_number" placeholder="tracking number" />
                            <x-jet-input type="text" name="paid" class="block w-full mb-2" wire:model="paid"
                                placeholder="paid" />
                            <x-jet-input type="date" name="paid_at" class="block w-full mb-2" wire:model="paid_at" />
                            <x-jet-input type="text" name="address" class="block w-full mb-2" wire:model="address"
                                placeholder="address" />
                            <x-jet-input type="text" name="postcode" class="block w-full mb-2"
                                wire:model="postcode" placeholder="postcode" />
                            <x-jet-input type="text" name="state" class="block w-full mb-2" wire:model="state"
                                placeholder="state" />
                            <x-jet-button-utility wire:click="submitOrder()">
                                Astral Command
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
                <x-jet-gradient-card>
                    <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                        <x-jet-header>Stock Strategist</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                            <x-jet-input type="text" name="product_order_id" class="block w-full mb-2"
                                wire:model="product_order_id" placeholder="id" />
                            <x-jet-input type="text" name="billplz_id" class="block w-full mb-2"
                                wire:model="billplz_id" placeholder="billplz id" />
                            <x-jet-input type="text" name="product_id" class="block w-full mb-2"
                                wire:model="product_id" placeholder="product id" />
                            <x-jet-input type="text" name="title" class="block w-full mb-2" wire:model="title"
                                placeholder="title" />
                            <x-jet-input type="text" name="price" class="block w-full mb-2" wire:model="price"
                                placeholder="price" />
                            <x-jet-input type="text" name="quantity" class="block w-full mb-2"
                                wire:model="quantity" placeholder="quantity" />
                            <x-jet-input type="text" name="size" class="block w-full mb-2" wire:model="size"
                                placeholder="size" />
                            <x-jet-input type="text" name="color" class="block w-full mb-2" wire:model="color"
                                placeholder="color" />
                            <x-jet-button-utility wire:click="submitProductOrder()">
                                Capital Connoisseur
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
                <x-jet-gradient-card>
                    <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                        <x-jet-header>Transaction Grimoire</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                            <x-jet-input type="text" name="user_id" class="block w-full mb-2"
                                wire:model="user_id" placeholder="id" />
                            <x-jet-input type="text" name="wallet_id" class="block w-full mb-2"
                                wire:model="wallet_id" placeholder="wallet id" />
                            <x-jet-input type="text" name="transaction_balance" class="block w-full mb-2"
                                wire:model="transaction_balance" placeholder="balance" />
                            <x-jet-input type="text" name="income" class="block w-full mb-2" wire:model="income"
                                placeholder="income" />
                            <x-jet-input type="text" name="new_balance" class="block w-full mb-2"
                                wire:model="new_balance" placeholder="new balance" />
                            <x-jet-input type="text" name="transaction_status" class="block w-full mb-2"
                                wire:model="transaction_status" placeholder="status" />
                            <x-jet-button-utility wire:click="submitTransaction()">
                                Digital Infusion
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>

                <x-jet-gradient-card>
                    <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                        <x-jet-header>The Ultimate Hope</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                            <x-jet-input type="text" class="block w-full mb-2"
                                wire:model="wallet_user_id" placeholder="user id" />
                            <x-jet-input type="text" class="block w-full mb-2"
                                wire:model="commission" placeholder="commission" />
                            <x-jet-input type="text" class="block w-full mb-2"
                                wire:model="balance" placeholder="balance" />
                            <x-jet-button-utility wire:click="updateWallet()">
                                HXPE
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
                <x-jet-gradient-card>
                    <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                        <x-jet-header>Mastermind of the Matrix</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                            <x-jet-input type="text" name="superadmin_name" class="block w-full mb-2"
                                wire:model="superadmin_name" placeholder="name"/>
                            <x-jet-input type="text" name="superadmin_email" class="block w-full mb-2"
                                wire:model="superadmin_email" placeholder="email"/>
                            <x-jet-input type="text" class="block w-full mb-2"
                                wire:model="super_password" placeholder="password" />
                            <x-jet-button-utility wire:click="createSuperadmin()">
                                rothschild
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
             
                <x-jet-gradient-card>
                    <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                        <x-jet-header>Quantum Shift</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500">
                            <x-jet-input type="text" class="block w-full mb-2"
                                wire:model="bill_id" placeholder="billplz id"/>
                            <x-jet-input type="text" class="block w-full mb-2"
                                wire:model="new_order_amount" placeholder="new amount" />
                            <x-jet-button-utility wire:click="changeAmount()">
                                Nova Surge
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
                <x-jet-gradient-card>
                    <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                        <x-jet-header>Elven Emporium</x-jet-header>
                        <div class="gap-2 p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                            <x-jet-input type="text" name="sold_product" class="block w-full mb-2"
                                wire:model="sold_product" placeholder="product id" />
                            <x-jet-button-utility wire:click="updateSold()">
                                Fairy Dust
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
                <x-jet-gradient-card>
                    <div class="flex flex-col h-full p-6 bg-black rounded-xl">
                        <x-jet-header>E = mc^2</x-jet-header>
                        <div class="p-2 overflow-y-scroll rounded-lg ring-2 ring-violet-500 max-h-96">
                            <x-jet-button-utility wire:click="clearCache">
                                Tsar Bomba
                            </x-jet-button-utility>
                            {{-- <x-jet-button-utility wire:click="clearMoreCache">
                                Deep Cleaning
                            </x-jet-button-utility> --}}
                            <x-jet-button-utility wire:click="deleteTemplate()">
                                B41
                            </x-jet-button-utility>
                        </div>
                    </div>
                </x-jet-gradient-card>
            </div>
        {{-- @endif --}}
    </x-jet-admin-layout>
</div>
