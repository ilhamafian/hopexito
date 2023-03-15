@inject('carbon', 'Carbon\Carbon')
<div class="relative my-5" x-data="{ modal: false, nav: 1, open: false, toggle() { this.open = !this.open } }">
    <x-jet-wallet-card>
        <h1
            class="text-3xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
            Your Wallet</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 md:flex-row">
            <div class="grid grid-cols-2 gap-4 mt-10 text-white">
                <div class="">
                    <p class="">Lifetime Commission (RM)</p>
                    <p
                        class="mt-1 text-2xl text-transparent md:text-4xl bg-clip-text bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500">
                        {{ number_format($wallet->commission, 2) }}</p>
                </div>
                <div class="text-center bg-black rounded-lg ring-4 ring-indigo-500 py-2">
                    <p class="  ">Available balance (RM)</p>
                    <p class="text-2xl">{{ number_format($wallet->balance, 2) }}</p>
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
                        <p class="px-1 mt-4 text-rose-400">Withdrawal request will be available again once
                            latest request has been approved.</p>
                    @endif
                </div>
            </div>
            <div class="mt-4 text-white md:w-1/2 md:p-4 xl:p-8 md:mt-0">
                <div
                    class="relative h-56 text-white transition shadow-lg shadow-black/30 hover:scale-105 w-88 md:w-96 rounded-2xl">
                    <img class="absolute w-full h-full rounded-xl" src="../image/wallet/wallet-2.png">
                    <div class="absolute w-full px-8 top-8">
                        <div class="h-8 my-1">
                            <p class="">Bank Holder Name</p>
                            <p class="tracking-widest text-lime-400">{{ $wallet->bank_holder_name }}</p>
                        </div>
                        <div class="flex justify-between">
                            <div class="h-8 my-1">
                                <p class="">Bank Account Number</p>
                                <p class="tracking-widest text-lime-400">
                                    {{ $wallet->bank_account_number }}
                                </p>
                            </div>
                            <div class="h-8 my-1">
                                <p class="">Bank Name</p>
                                <p class="tracking-widest text-lime-400">{{ $wallet->bank_name }}</p>
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
        <div class="relative mt-12">
            <ul class="flex border-b border-gray-100">
                <li class="flex-1 hover:bg-white/10 transition">
                    <a class="relative block p-4 cursor-pointer" x-on:click="nav = 1">
                        <span x-bind:class="nav == 1 ? 'bg-fuchsia-600' : 'bg-tranparent'" class="absolute inset-x-0 -bottom-px h-px w-full"></span>
                        <div class="flex items-center justify-center gap-4">
                            <span x-bind:class="nav == 1 ? 'text-fuchsia-500':'text-white'" class="text-sm font-medium">Withdrawal History</span>
                        </div>
                    </a>
                </li>
                <li class="flex-1 hover:bg-white/10 transition">
                    <a class="relative block p-4 cursor-pointer" x-on:click="nav = 2">
                        <span x-bind:class="nav == 2 ? 'bg-fuchsia-600' : 'bg-tranparent'" class="absolute inset-x-0 -bottom-px h-px w-full"></span>
                        <div class="flex items-center justify-center gap-4">
                            <span x-bind:class="nav == 2 ? 'text-fuchsia-500':'text-white'" class="text-sm font-medium">Income History</span>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="flex-col space-y-1 gap-2 mt-6 overflow-x-auto" x-show="nav == 1" x-transition:enter.duration.500>
                <div class="w-full p-2 rounded-lg bg-black/50 overflow-x-auto">
                    <div class="flex text-center text-xs lg:text-md">
                        <p class="basis-[16%]"><span class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Old
                                Balance</span></p>
                        <p class="basis-[10%]"><span
                                class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Amount</span></p>
                        <p class="basis-[16%]"><span
                                class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Balance</span></p>
                        <p class="basis-[12%]"><span
                                class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Status</span></p>
                        <p class="basis-[26%]"><span class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Withdrawal
                                Details</span></p>
                        <p class="basis-[20%]"><span class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Last
                                updated</span></p>
                    </div>
                </div>
                @foreach ($withdrawal as $item)
                    <div
                        class="w-full p-3 transition rounded-lg shadow-md bg-black/50 hover:shadow-fuchsia-400/30 overflow-x-auto">
                        <div class="flex items-center text-xs text-center">
                            <p class="basis-[16%]">{{ number_format($item->balance, 2) }}</p>
                            <p class="basis-[10%]">{{ number_format($item->withdrawal, 2) }}</p>
                            <p class="basis-[16%]">{{ number_format($item->new_balance, 2) }}</p>
                            @if ($item->status == 1)
                                <p class="relative basis-[12%] p-0.5 bg-rose-500/50 rounded-md">
                                    Pending
                                </p>
                            @elseif($item->status == 2)
                                <p class="relative basis-[12%] py-0.5 bg-lime-400/80 rounded-md">
                                    Approved
                                </p>
                            @endif
                            <p class="basis-[26%]">{{ $wallet->bank_account_number }} ( {{ $wallet->bank_name }})</p>
                            <p class="basis-[20%]">{{ $carbon::parse($item->updated_at)->format('F d, Y g:i A') }}</p>
                        </div>
                    </div>
                @endforeach
                {{ $withdrawal->links() }}
            </div>
            <div class="flex-col gap-2 space-y-1 mt-6 text-white" x-show="nav == 2" x-transition:enter.duration.500>
                <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                    <div class="flex items-center text-center">
                        <p class="basis-[20%]"><span class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Old
                                Balance</span></p>
                        <p class="basis-[14%]"><span
                                class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Income</span>
                        </p>
                        <p class="basis-[20%]"><span class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">New
                                Balance</span></p>
                        <p class="basis-[16%]"><span
                                class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Status</span></p>
                        <p class="basis-[30%]"><span class="md:px-3 md:py-1 md:rounded-md md:bg-violet-500">Last
                                Updated</span></p>
                    </div>
                </div>
                @foreach ($income as $item)
                    <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                        <div class="flex items-center justify-between gap-2 text-center text-xs">
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
                                        class="px-3 rounded-md bg-green-400/80">Income</span>
                                </p>
                            @elseif($item->status == 4)
                                <p class="relative basis-[16%]"><span
                                        class="px-3 rounded-md bg-cyan-400/80">Bonus</span>
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
