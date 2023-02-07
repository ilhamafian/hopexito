@inject('carbon', 'Carbon\Carbon')
<div class="relative my-5" x-data="{ modal: false, nav: 1, open: false, toggle() { this.open = !this.open } }">
    <x-jet-wallet-card>


        <h1
            class="text-3xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
            Your Wallet</h1>
        <div class="group">
            <button class="w-full transition border-b-2 border-indigo-500 group-hover:border-rose-400"
                x-on:click="toggle()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor"
                    class="float-right w-5 h-5 text-indigo-500 transition rounded-md group-hover:text-rose-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 4.5l-15 15m0 0h11.25m-11.25 0V8.25" />
                </svg>
            </button>
        </div>
        <div x-cloak class="w-full p-4 mt-2  bg-indigo-400 rounded-lg" x-show="open" x-transition:enter.duration.500>
            <ul class="grid grid-cols-3 list-disc list-inside">
                <li>Lifetime Commission
                    <p>Lifetime Commission </p>
                </li>
                <li>Available Balance
                    <p></p>
                </li>
                <li>Withdrawal Request
                    <p></p>
                </li>
                <li>Withdrawal Details
                    <p></p>
                </li>
                <li>Withdrawal Summary
                    <p></p>
                </li>
                <li>Income Summary
                    <p></p>
                </li>
            </ul>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 md:flex-row">
            <div class="grid grid-cols-2 gap-4 mt-10 text-white">
                <div class="">
                    <p class="">Lifetime Commission (RM)</p>
                    <p
                        class="mt-1 text-2xl text-transparent md:text-4xl bg-clip-text bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                        {{ number_format($wallet->commission, 2) }}</p>
                </div>
                <div class="text-center bg-black rounded-lg ring-4 ring-indigo-500">
                    <p class="mt-4">Available balance (RM)</p>
                    <p class="text-3xl">{{ number_format($wallet->balance, 2) }}</p>
                </div>

                <div class="col-span-2">
                    <x-jet-input class="block w-full my-3" type="text" wire:model="withdrawal_amount"
                        placeholder="Minimum balance must be above RM50" />
                    @error('withdrawal_amount')
                        <p class="my-3 text-rose-500">{{ $message }}</p>
                    @enderror
                    @if ($wallet->status != 2)
                        <x-jet-button type="button" wire:click="withdrawalRequest('{{ $wallet->user_id }}')">
                            Request Withdrawal
                        </x-jet-button>
                    @else
                        <p class="px-1 mt-4  text-rose-400">Withdrawal request will be available again once
                            latest request has been approved.</p>
                    @endif
                </div>
            </div>
            <div class="mt-4 text-white md:w-1/2 md:p-8 md:mt-0">
                <div
                    class="relative h-56 text-white transition shadow-lg shadow-black/30 hover:scale-105 w-88 md:w-96 rounded-2xl">
                    <img class="absolute w-full h-full rounded-xl" src="../image/wallet/wallet-2.png">
                    <div class="absolute w-full px-8 top-8">
                        <div class="h-8 my-1">
                            <p class="">Bank Holder Name</p>
                            <p class=" tracking-widest text-lime-400">{{ $wallet->bank_holder_name }}</p>
                        </div>
                        <div class="flex justify-between">
                            <div class="h-8 my-1">
                                <p class="">Bank Account Number</p>
                                <p class=" tracking-widest text-lime-400">
                                </p>
                            </div>
                            <div class="h-8 my-1">
                                <p class="">Bank Name</p>
                                <p class=" tracking-widest text-lime-400">{{ $wallet->bank_name }}</p>
                            </div>
                        </div>
                        <div class="flex gap-2 mt-10">
                            <x-jet-button-custom x-on:click="modal = true">
                                Withdrawal Details
                            </x-jet-button-custom>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12">
            <x-jet-button-utility x-cloak x-on:click="nav = 1"
                x-bind:class="nav == 1 ? 'bg-indigo-500' : 'bg-transparent'">
                Withdrawal Summary
            </x-jet-button-utility>
            <x-jet-button-utility x-cloak x-on:click="nav = 2"
                x-bind:class="nav == 2 ? 'bg-indigo-500' : 'bg-transparent'">
                Income Summary
            </x-jet-button-utility>
            <div class="flex-col hidden gap-2 mt-6 text-white lg:flex" x-show="nav == 1"
                x-transition:enter.duration.500>
                <div class="w-full p-2 rounded-lg bg-black/50">
                    <div class="flex  text-center">
                        <p class="basis-[16%]"><span class="px-3 py-1 rounded-md bg-violet-500">Old Balance</span>
                        </p>
                        <p class="basis-[10%]"><span class="px-3 py-1 rounded-md bg-violet-500">Amount</span>
                        </p>
                        <p class="basis-[16%]"><span class="px-3 py-1 rounded-md bg-violet-500">New Balance</span>
                        </p>
                        <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Status</span>
                        </p>
                        <p class="basis-[26%]"><span class="px-3 py-1 rounded-md bg-violet-500">Withdrawal
                                Details</span>
                        </p>
                        <p class="basis-[20%]"><span class="px-3 py-1 rounded-md bg-violet-500">Last updated</span>
                        </p>
                    </div>
                </div>
                @foreach ($withdrawal as $item)
                    <div class="w-full p-3 transition rounded-lg shadow-md bg-black/50 hover:shadow-fuchsia-400/30">
                        <div class="flex items-center text-sm text-center">
                            <p class="basis-[5%]">{{ $item->id }}
                            </p>
                            <p class="basis-[16%]">{{ number_format($item->balance, 2) }}
                            </p>
                            <p class="basis-[10%]">{{ number_format($item->withdrawal, 2) }}
                            </p>
                            <p class="basis-[16%]">{{ number_format($item->new_balance, 2) }}
                            </p>
                            @if ($item->status == 1)
                                <p class="relative basis-[12%]"><span
                                        class="absolute w-2 h-2 p-1 rounded-full top-1.5 left-3 bg-red-500"></span>Pending
                                </p>
                            @elseif($item->status == 2)
                                <p class="relative basis-[12%]"><span
                                        class="absolute w-2 h-2 p-1 rounded-full top-1.5 left-2 bg-lime-400"></span>Approved
                                </p>
                            @endif
                            </p>
                            <p class="basis-[26%]">{{ $wallet->bank_account_number }} ( {{ $wallet->bank_name }})
                            </p>
                            </p>

                            <p class="basis-[20%]">
                                {{ $carbon::parse($item->updated_at)->format('F d, Y g:i A') }}
                            </p>
                        </div>
                    </div>
                @endforeach
                {{ $withdrawal->links() }}
            </div>
            <div class="flex-col hidden gap-2 mt-6 text-white lg:flex" x-show="nav == 2"
                x-transition:enter.duration.500>
                <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                    <div class="flex items-center text-center text-white">
                        <p class="basis-[20%]"><span class="px-3 py-1 rounded-md bg-violet-500">Old
                                Balance</span></p>
                        <p class="basis-[14%]"><span class="px-3 py-1 rounded-md bg-violet-500">Income</span>
                        </p>
                        <p class="basis-[20%]"><span class="px-3 py-1 rounded-md bg-violet-500">New
                                Balance</span></p>
                        <p class="basis-[16%]"><span class="px-3 py-1 rounded-md bg-violet-500">Status</span></p>
                        <p class="basis-[30%]"><span class="px-3 py-1 rounded-md bg-violet-500">Last
                                Updated</span></p>
                    </div>
                </div>
                @foreach ($income as $item)
                    <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                        <div class="flex items-center justify-between gap-2 text-center text-white">
                            <p class="basis-[20%]">{{ number_format($item->balance, 2) }}</p>
                            @if ($item->status == 3)
                                <p class="px-2 font-bold rounded-md text-green-500 ring-2 ring-green-500 basis-[14%]">
                                    {{ number_format($item->income, 2) }}</p>
                            @elseif($item->status == 4)
                                <p class="px-2 font-bold rounded-md text-cyan-500 ring-2 ring-cyan-500 basis-[14%]">
                                    {{ number_format($item->income, 2) }}</p>
                            @endif

                            <p class="basis-[20%]">{{ number_format($item->new_balance, 2) }}</p>
                            @if ($item->status == 3)
                                <p class="relative basis-[16%]"><span
                                        class="px-3 bg-green-400/80 rounded-md">Income</span>
                                </p>
                            @elseif($item->status == 4)
                                <p class="relative basis-[16%]"><span
                                        class="px-3 bg-cyan-400/80 rounded-md">Bonus</span>
                                </p>
                            @endif
                            <p class="basis-[30%]">
                                {{ $carbon::parse($item->updated_at)->format('F d, Y g:i A') }}</p>
                        </div>
                    </div>
                @endforeach
                <div class="">
                    {{ $income->links() }}
                </div>

            </div>
        </div>
    </x-jet-wallet-card>
    <x-jet-modal-custom>
        <form class="flex-col w-full space-y-4">
            <x-jet-label for="name" value="{{ __('Bank Holder Name') }}" />
            <x-jet-input id="name" class="block w-full mt-1" type="text"
                wire:model.defer="bank_holder_name" />
            @error('bank_holder_name')
                <p class="text-rose-500">{{ $message }}</p>
            @enderror
            <x-jet-label for="bank-name" value="{{ __('Bank Name') }}" />
            <x-jet-input id="bank-name" class="block w-full mt-1" type="text" wire:model.defer="bank_name" />
            @error('bank_name')
                <p class="text-rose-500">{{ $message }}</p>
            @enderror
            <x-jet-label for="bank-account" value="{{ __('Bank Account Number') }}" />
            <x-jet-input id="bank-account" class="block w-full mt-1" type="text"
                wire:model.defer="bank_account_number" />
            @error('bank_account_number')
                <p class="text-rose-500">{{ $message }}</p>
            @enderror
            <x-jet-button type="button" wire:click="updateBankAccountDetails('{{ $wallet->user_id }}')">
                Save
            </x-jet-button>
        </form>
    </x-jet-modal-custom>
</div>
