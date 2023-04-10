@inject('carbon', 'Carbon\Carbon')
<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="" x-data="{ modal: false, id: '', tab: 1 }">
            <div class="grid grid-cols-4 gap-6 text-center text-white">
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Total Commission (RM)
                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-4xl">
                        {{ number_format($wallet_data->sum('commission'), 2) }}
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Total Available Balance (RM)
                    </x-jet-admin-header>
                    </span>
                    <div class="block p-2 mt-4 text-4xl">
                        {{ number_format($wallet_data->sum('balance'), 2) }}
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Total Withdrawal (RM)

                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-4xl">
                        {{ number_format($wallet_data->sum('commission') - $wallet_data->sum('balance'), 2) }}
                    </div>
                </x-jet-admin-card>
                <x-jet-admin-card>
                    <x-jet-admin-header>
                        Total Wallets

                    </x-jet-admin-header>
                    <div class="block p-2 mt-4 text-4xl">
                        {{ $wallet_data->count() }}
                    </div>
                </x-jet-admin-card>
            </div>
            <x-jet-section-border />
            <x-jet-admin-card>
                <x-jet-header>Withdrawal Request</x-jet-header>
                <div class="flex flex-col gap-2 m-4">
                    <div class="w-full p-2 rounded-lg bg-black/50">
                        <div class="flex items-center text-white">
                            <p class="basis-[11%]"><span class="px-3 py-1 rounded-md bg-violet-500">Wallet Name</span>
                            </p>
                            <p class="basis-[18%]"><span class="px-3 py-1 rounded-md bg-violet-500">Name</span>
                            </p>
                            <p class="basis-[10%]"><span class="px-3 py-1 rounded-md bg-violet-500">Bank Name</span></p>
                            <p class="basis-[14%]"><span class="px-3 py-1 rounded-md bg-violet-500">Account
                                    Number</span>
                            </p>
                            <p class="basis-[7%]"><span class="px-3 py-1 rounded-md bg-violet-500">B(RM)</span></p>
                            <p class="basis-[7%]"><span class="px-3 py-1 rounded-md bg-violet-500">W(RM)</span></p>
                            <p class="basis-[7%]"><span class="px-3 py-1 rounded-md bg-violet-500">N(RM)</span></p>
                            <p class="basis-[10%]"><span class="px-3 py-1 rounded-md bg-violet-500">Actions</span></p>
                            <p class="basis-[16%]"><span class="px-3 py-1 rounded-md bg-violet-500">Last Updated</span>
                            </p>
                        </div>
                    </div>
                    @foreach ($wallets as $wallet)
                        <div class="w-full p-3 rounded-lg bg-black/50" x-data="{ open: false, id: '' }">
                            @if ($wallet->status == 2)
                                <div class="flex items-center text-white">
                                    <p class="basis-[11%] text-xs">{{ $wallet->name }}</p>
                                    <p class="basis-[18%] text-xs">{{ $wallet->bank_holder_name }} </p>
                                    <p class="basis-[10%]">{{ $wallet->bank_name }}</p>
                                    <p class="basis-[14%]">{{ $wallet->bank_account_number }}</p>
                                    @foreach ($wallet_requests as $item)
                                        @if ($item->wallet_id == $wallet->id)
                                            <p class="basis-[7%] text-center">{{ number_format($item->balance, 2) }}</p>
                                            <p
                                                class="basis-[7%] text-center text-rose-500 ring-2 ring-rose-500 rounded-md p-0.5 font-bold">
                                                {{ number_format($item->withdrawal, 2) }}</p>
                                            <p class="basis-[7%] text-center">
                                                {{ number_format($item->new_balance, 2) }}
                                            </p>

                                            <div class="relative basis-[10%]">
                                                <svg x-on:click="open = true; id = '{{ $wallet->user_id }}'"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-10 h-8 px-2 py-1 ml-5 transition bg-pink-500 rounded-lg hover:bg-gradient-to-tr from-violet-500 to-orange-300 hover:scale-105">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                                </svg>
                                                <ul x-show="open == true && id == '{{ $wallet->user_id }}'"
                                                    x-transition.duration.500 x-on:click.away="open = false"
                                                    class="absolute z-10 w-10 p-2 mt-1 text-white shadow-lg shadow-fuchsia-500/50 bg-zinc-900 rounded-xl -left-20"
                                                    style="min-width:15rem">
                                                    <button type="button"
                                                        class="w-full px-4 py-2 text-center rounded-md hover:bg-indigo-500"
                                                        wire:click="approve('{{ $wallet->user_id }}')">
                                                        Approve Request
                                                    </button>
                                                </ul>
                                            </div>
                                            <p class="basis-[16%]">
                                                {{ $carbon::parse($item->updated_at)->format('F d, Y g:i A') }}</p>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </x-jet-admin-card>
            <x-jet-section-border />
            <x-jet-admin-card>
                <x-jet-header>Income Transaction</x-jet-header>
                <div class="flex flex-col gap-2 m-4">
                    <div class="w-full p-2 rounded-lg bg-black/50">
                        <div class="flex items-center text-center text-white">
                            <p class="basis-[30%]"><span class="px-3 py-1 rounded-md bg-violet-500">Name</span>
                            </p>
                            <p class="basis-[15%]"><span class="px-3 py-1 rounded-md bg-violet-500">Balance</span>
                            </p>
                            <p class="basis-[15%]"><span class="px-3 py-1 rounded-md bg-violet-500">Income</span></p>
                            <p class="basis-[15%]"><span class="px-3 py-1 rounded-md bg-violet-500">New Balance</span>
                            </p>
                            <p class="basis-[25%]"><span class="px-3 py-1 rounded-md bg-violet-500">Created At</span>
                            </p>
                        </div>
                    </div>
                    @foreach ($walletTransactions as $item)
                        <div class="w-full p-3 rounded-lg bg-black/50" x-data="{ open: false, id: '' }">
                            <div class="flex items-center text-center text-white">
                                <p class="basis-[30%] text-violet-400">{{ $item->walletHolder->name }}</p>
                                <p class="basis-[15%]">{{ $item->balance }} </p>
                                <p class="basis-[15%]"><span class="px-2 py-0.5 bg-teal-600 rounded-md">{{ $item->income }}</span></p>
                                <p class="basis-[15%]">{{ $item->new_balance }}</p>
                                <p class="basis-[25%]">{{ $carbon::parse($item->created_at)->format('F d, Y g:i A') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4">
                        {{ $walletTransactions->links('/vendor/pagination/tailwind') }}
                    </div>
                </div>
            </x-jet-admin-card>
            <x-jet-section-border />
            <x-jet-admin-card>
                <div class="flex items-center justify-between">
                    <x-jet-header>List of Wallets</x-jet-header>
                    <x-jet-input class="" type="text" wire:model="search"
                        placeholder="Search by wallet name" />
                </div>
                <div class="grid grid-cols-3 gap-4 mt-4">
                    @foreach ($wallet_all->sortByDesc('commission') as $wallet)
                        <div
                            class="relative h-56 mx-auto text-white transition shadow-lg shadow-black/30 hover:scale-105 w-96 rounded-2xl">
                            <img class="absolute w-full h-full rounded-xl" src="../image/wallet/wallet-3.png">
                            <div class="absolute w-full px-8 space-y-5 top-8">
                                <div class="flex gap-4">
                                    <button type="button" x-on:click="id = '{{ $wallet->id }}'; modal = true">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="h-10 px-4 py-2 rounded-lg w-13 bg-black/50 hover:bg-gradient-to-r from-green-300 via-blue-500 to-purple-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                        </svg>
                                    </button>
                                </div>
                                <div
                                    class="p-1 shadow-xl rounded-2xl bg-gradient-to-br from-indigo-500 via-sky-500 to-pink-400">
                                    <div class="flex justify-between px-4 py-1 font-bold tracking-wider text-black">
                                        <p>{{ $wallet->name }}</p>
                                        <p>{{ $wallet->id }}</p>
                                    </div>
                                    <div class="grid grid-cols-2 p-4 text-center bg-black rounded-xl">
                                        <div class="">
                                            <p class="text-xs">Lifetime Commission</p>
                                            <p class="text-lg text-indigo-400">
                                                {{ number_format($wallet->commission, 2) }}
                                            </p>
                                        </div>
                                        <div class="border-l-2 border-indigo-500">
                                            <p class="text-xs">Available Balance</p>
                                            <p class="text-lg text-pink-400">{{ number_format($wallet->balance, 2) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-cloak x-show="modal == true && id == '{{ $wallet->id }}'"
                            @keydown.escape.prevent.stop="modal = false" class="fixed inset-0 z-50">
                            <!-- Overlay -->
                            <div x-show="modal" x-transition.opacity class="fixed inset-0 bg-black/80 rounded-xl">
                            </div>
                            <!-- Panel -->
                            <div x-show="modal" x-transition @click="modal = false"
                                class="relative flex items-center justify-center w-full h-full">
                                <div @click.stop style="max-height: 80vh"
                                    class="z-20 flex flex-col w-4/5 px-12 py-8 overflow-y-auto border-2 border-indigo-500 shadow-md bg-zinc-900 rounded-2xl shadow-rose-500/50">
                                    <div class="flex gap-2">
                                        <button x-on:click="tab = 1"
                                            class="relative p-0.5 inline-flex items-center justify-center font-bold overflow-hidden group rounded-md">
                                            <span
                                                class="absolute w-full h-8 rounded-md bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500 group-hover:from-rose-400 group-hover:via-fuchsia-500 group-hover:to-indigo-400"></span>
                                            <span :class="tab == 1 ? 'bg-opacity-0' : ''"
                                                class="relative px-2 py-1 transition-all ease-out rounded-md bg-neutral-900 group-hover:bg-opacity-0 duration-400">
                                                <span :class="tab == 1 ? 'text-black ' : ''"
                                                    class="relative text-white">Withdrawal History</span>
                                            </span>
                                        </button>
                                        <button x-on:click="tab = 2"
                                            class="relative p-0.5 inline-flex items-center justify-center font-bold overflow-hidden group rounded-md">
                                            <span
                                                class="absolute w-full h-8 rounded-md bg-gradient-to-r from-blue-400 to-emerald-400 group-hover:from-blue-400 group-hover:to-emerald-400"></span>
                                            <span :class="tab == 2 ? 'bg-opacity-0 ' : ''"
                                                class="relative px-2 py-1 transition-all ease-out rounded-md bg-neutral-900 group-hover:bg-opacity-0 duration-400">
                                                <span :class="tab == 2 ? 'text-black ' : ''"
                                                    class="relative text-white">Commission History</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div x-cloak x-show="tab == 1" class="flex flex-col w-full gap-2 mt-4"
                                        x-transition:enter.duration.500>
                                        <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                                            <div class="flex items-center text-center text-white">
                                                <p class="basis-[18%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">Old
                                                        Balance</span></p>
                                                <p class="basis-[16%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">Withdrawal</span>
                                                </p>
                                                <p class="basis-[19%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">New
                                                        Balance</span></p>
                                                <p class="basis-[15%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">Status</span></p>
                                                <p class="basis-[32%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">Last Updated</span>
                                                </p>
                                            </div>
                                        </div>
                                        @foreach ($wallet->walletTransaction->sortByDesc('updated_at') as $item)
                                            @unless($item->status == 3 || $item->status == 4)
                                                <div class="w-full p-2 rounded-lg bg-black/50">
                                                    <div class="flex items-center text-center text-white">
                                                        <p class="basis-[18%]">{{ number_format($item->balance, 2) }}</p>
                                                        <p
                                                            class="basis-[16%] px-2 font-bold rounded-md text-rose-500 ring-2 ring-rose-500">
                                                            {{ number_format($item->withdrawal, 2) }}</p>
                                                        <p class="basis-[19%]">{{ number_format($item->new_balance, 2) }}
                                                        </p>
                                                        @if ($item->status == 1)
                                                            <p class="relative basis-[16%]"><span
                                                                    class="absolute w-2 h-2 p-1 rounded-full top-1.5 left-0 bg-red-500"></span>Pending
                                                            </p>
                                                        @else
                                                            <p class="relative basis-[16%]"><span
                                                                    class="absolute w-2 h-2 p-1 rounded-full top-1.5 left-0 bg-green-500"></span>Approved
                                                            </p>
                                                        @endif
                                                        <p class="basis-[31%]">
                                                            {{ $carbon::parse($item->updated_at)->format('F d, Y g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endunless
                                        @endforeach
                                    </div>
                                    <div x-cloak x-show="tab == 2" class="flex flex-col w-full gap-2 mt-4"
                                        x-transition:enter.duration.500>
                                        <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                                            <div class="flex items-center text-center text-white">
                                                <p class="basis-[18%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">Old
                                                        Balance</span></p>
                                                <p class="basis-[15%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">Income</span>
                                                </p>
                                                <p class="basis-[20%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">New
                                                        Balance</span></p>
                                                <p class="basis-[15%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">Status</span></p>
                                                <p class="basis-[32%]"><span
                                                        class="px-3 py-1 rounded-md bg-violet-500">Last Updated</span>
                                                </p>
                                            </div>
                                        </div>
                                        @foreach ($wallet->walletTransaction->sortByDesc(function ($item) {
        return [$item->updated_at, $item->id];
    }) as $item)
                                            @unless($item->status == 2 || $item->status == 1)
                                                <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                                                    <div
                                                        class="flex items-center justify-between gap-2 text-center text-white">
                                                        <p class="basis-[18%]">{{ number_format($item->balance, 2) }}</p>
                                                        <p
                                                            class="px-2 font-bold rounded-md text-cyan-500 ring-2 ring-cyan-500 basis-[15%]">
                                                            {{ number_format($item->income, 2) }}</p>
                                                        <p class="basis-[20%]">{{ number_format($item->new_balance, 2) }}
                                                        </p>
                                                        @if ($item->status == 3)
                                                            <p class="relative basis-[15%]"><span
                                                                    class="absolute w-2 h-2 p-1 rounded-full top-1.5 left-0 bg-green-400"></span>Income
                                                            </p>
                                                        @elseif($item->status == 4)
                                                            <p class="relative basis-[15%]"><span
                                                                    class="absolute w-2 h-2 p-1 rounded-full top-1.5 left-0 bg-blue-400"></span>Bonus
                                                            </p>
                                                        @endif
                                                        <p class="basis-[32%]">
                                                            {{ $carbon::parse($item->updated_at)->format('F d, Y g:i A') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endunless
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $wallet_all->links('/vendor/pagination/tailwind') }}
                </div>
            </x-jet-admin-card>
        </div>
    </x-jet-admin-layout>
</div>
