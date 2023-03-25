@inject('carbon', 'Carbon\Carbon')
<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <x-jet-admin-card>
            <div class="flex flex-col px-3">
                <x-jet-header>Active Sessions <span>{{ $sessions->count() - 1 }}</span></x-jet-header>
            </div>
            <div class="flex flex-col gap-2 m-3">
                <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                    <div class="flex items-center text-center">
                        <p class="basis-[4%]"><span class="px-3 py-1 rounded-md bg-violet-500">ID</span>
                        </p>
                        <p class="basis-[15%]"><span class="px-3 py-1 rounded-md bg-violet-500">IP
                                Address</span>
                        </p>
                        <p class="basis-[25%]"><span class="px-3 py-1 rounded-md bg-violet-500">User
                                Agent</span>
                        </p>
                        <p class="basis-[45%]"><span class="px-3 py-1 rounded-md bg-violet-500">Payload</span>
                        </p>
                        <p class="basis-[15%]"><span class="px-3 py-1 rounded-md bg-violet-500">Last Activity</span>
                        </p>
                    </div>
                </div>
                @foreach ($sessions as $item)
                    @unless($item->user_id == 1)
                        <div class="w-full p-2 rounded-lg bg-black/50" x-data="{ modal: false }">
                            <div class="flex items-center text-center">
                                <p class="basis-[4%]">{{ $item->user_id }}</p>
                                <p class="basis-[15%] text-pink-400">{{ $item->ip_address }}
                                </p>
                                <p class="basis-[25%] text-xs text-fuchsia-400">{{ $item->user_agent }}</p>
                                <p class="basis-[45%] text-purple-400">
                                    @foreach ($item as $payload)
                                        @if (is_array($payload))
                                            @foreach ($payload as $value)
                                                <span class="">{{ htmlspecialchars($value) }}</span>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </p>
                                <p class="basis-[15%] text-violet-400">
                                    {{ $carbon::parse($item->last_activity)->format('F d, Y g:i A') }}
                                </p>
                            </div>
                        </div>
                    @endunless
                @endforeach
            </div>
        </x-jet-admin-card>
    </x-jet-admin-layout>
</div>
