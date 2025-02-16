<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-1">
            <x-jet-admin-card>
                <div class="flex flex-col px-3">
                    <x-jet-header>List of Designers</x-jet-header>
                    <x-jet-input class="" type="text" wire:model.lazy="search" placeholder="Search by artist name" />
                </div>
                <div class="flex flex-col gap-2 m-3">
                    <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                        <div class="flex items-center text-center">
                            <p class="basis-[5%] text-left"><span
                                class="px-3 py-1 rounded-md bg-violet-500">Id</span>
                        </p>
                            <p class="basis-[21%] text-left"><span
                                    class="px-3 py-1 rounded-md bg-violet-500">Name</span>
                            </p>
                            <p class="basis-[22%] text-left"><span
                                    class="px-3 py-1 rounded-md bg-violet-500">Email</span>
                            </p>
                            <p class="basis-[6%]"><span class="px-3 py-1 rounded-md bg-violet-500">PFP</span>
                            </p>
                            <p class="basis-[6%]"><span class="px-3 py-1 rounded-md bg-violet-500">CI</span>
                            </p>
                            <p class="basis-[8%]"><span class="px-3 py-1 rounded-md bg-violet-500">P-C</span>
                            </p>
                            <p class="basis-[14%]"><span class="px-3 py-1 rounded-md bg-violet-500">Wallet</span>
                            </p>
                            <p class="basis-[8%]"><span class="px-3 py-1 rounded-md bg-violet-500">W-I</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Status</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Action</span>
                            </p>
                        </div>
                    </div>
                    @foreach ($artists as $artist)
                        <div class="w-full p-2 rounded-lg bg-black/50" x-data="{ modal: false }">
                            <div class="flex items-center text-center">
                                <p class="basis-[5%] text-left">{{ $artist->id }}</p>
                                <p class="basis-[21%] text-left">{{ $artist->name }}</p>
                                @if ($artist->email_verified_at)
                                    <p class="basis-[22%] text-left text-lime-500 truncate">{{ $artist->email }} </p>
                                @else
                                    <p class="basis-[22%] text-left text-rose-500">{{ $artist->email }} </p>
                                @endif
                                @if ($artist->profile_photo_path)
                                    <p class="basis-[6%] text-lime-500"><svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </p>
                                @else
                                    <p class="basis-[6%] text-rose-500"><svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </p>
                                @endif
                                @if ($artist->artist && $artist->artist->cover_image)
                                    <p class="basis-[6%] text-lime-500"><svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </p>
                                @else
                                    <p class="basis-[6%] text-rose-500"><svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 mx-auto">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </p>
                                @endif
                                <p class="basis-[8%]">
                                    <span
                                        class="px-2 py-0.5 bg-blue-500 rounded-md">{{ $artist->products()->count() }}</span>

                                    <span
                                        class="px-2 py-0.5 bg-cyan-500 rounded-md">{{ $artist->productCollections()->count() }}</span>
                                </p>
                                <p class="basis-[14%]">
                                    <span
                                        class="px-2 py-0.5 bg-emerald-500 rounded-md">{{ number_format($artist->wallet->commission, 2) }}</span>
                                    <span
                                        class="px-2 py-0.5 bg-fuchsia-500 rounded-md">{{ number_format($artist->wallet->balance, 2) }}</span>
                                </p>
                                <p class="basis-[8%]">
                                    <span
                                        class="px-2 py-0.5 bg-rose-500 rounded-md">{{ $artist->wallet->walletTransaction()->count('withdrawal') }}</span>
                                    <span
                                        class="px-2 py-0.5 bg-green-500 rounded-md">{{ $artist->wallet->walletTransaction()->count('income') }}</span>
                                </p>
                                @if ($artist->wallet->status == 1)
                                    <p class="basis-[12%] text-lime-500">1</p>
                                @else
                                    <p class="basis-[12%] text-rose-500">2</p>
                                @endif
                                <p class="basis-[12%]">
                                    <x-jet-button x-on:click="modal = true">
                                        Delete
                                    </x-jet-button>
                                    <x-jet-modal-custom>
                                        <x-jet-button wire:click="deleteArtist('{{ $artist->id }}')" class="mx-auto">
                                            Confirm Delete User: {{ $artist->name }}
                                        </x-jet-button>
                                    </x-jet-modal-custom>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $artists->links('/vendor/pagination/tailwind') }}
            </x-jet-admin-card>
            <x-jet-section-border/>
            <x-jet-admin-card>
                <div class="flex flex-col px-3">
                    <x-jet-header>List of Users</x-jet-header>
                    <x-jet-input class="" type="text" wire:model.lazy="search_user" placeholder="Search by user name" />
                </div>
                <div class="flex flex-col gap-2 m-3">
                    <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                        <div class="flex items-center text-center">
                            <p class="basis-[5%] text-left"><span
                                class="px-3 py-1 rounded-md bg-violet-500">Id</span>
                        </p>
                            <p class="basis-[21%] text-left"><span
                                    class="px-3 py-1 rounded-md bg-violet-500">Name</span>
                            </p>
                            <p class="basis-[22%] text-left"><span
                                    class="px-3 py-1 rounded-md bg-violet-500">Email</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Phone</span>
                            </p>
                            <p class="basis-[28%]"><span class="px-3 py-1 rounded-md bg-violet-500">Address</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">PostCode</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">State</span>
                            </p>
                        </div>
                    </div>
                    @foreach ($customers as $customer)
                        <div class="w-full p-2 rounded-lg bg-black/50" x-data="{ modal: false }">
                            <div class="flex items-center text-center">
                                <p class="basis-[5%] text-left">{{ $customer->id }}</p>
                                <p class="basis-[21%] text-left">{{ $customer->name }}</p>
                                @if ($customer->email_verified_at)
                                    <p class="basis-[22%] text-left text-lime-500 truncate">{{ $customer->email }} </p>
                                @else
                                    <p class="basis-[22%] text-left text-rose-500">{{ $customer->email }} </p>
                                @endif
                                <p class="basis-[14%]">{{ $customer->phone }}</p>
                                <p class="basis-[28%]">{{ $customer->address }}</p>
                                <p class="basis-[12%]">{{ $customer->postcode }}</p>
                                <p class="basis-[12%]">{{ $customer->state }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $customers->links('/vendor/pagination/tailwind') }}
            </x-jet-admin-card>
        </div>
    </x-jet-admin-layout>
</div>
