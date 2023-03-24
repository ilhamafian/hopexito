@inject('carbon', 'Carbon\Carbon')
<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <x-jet-admin-card>
            <div class="flex flex-col px-3">
                <x-jet-header>Active Sessions</x-jet-header>
            </div>
            <div class="flex flex-col gap-2 m-3">
                <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                    <div class="flex items-center text-center">
                        <p class="basis-[5%]"><span class="px-3 py-1 rounded-md bg-violet-500">Id</span>
                        </p>
                        <p class="basis-[20%]"><span class="px-3 py-1 rounded-md bg-violet-500">IP
                                Address</span>
                        </p>
                        <p class="basis-[55%]"><span class="px-3 py-1 rounded-md bg-violet-500">User
                                Agent</span>
                        </p>
                        <p class="basis-[20%]"><span class="px-3 py-1 rounded-md bg-violet-500">Last Activity</span>
                        </p>
                    </div>
                </div>
                @foreach ($sessions as $item)
                    <div class="w-full p-2 rounded-lg bg-black/50" x-data="{ modal: false }">
                        <div class="flex items-center text-center">
                            <p class="basis-[5%]">{{ $item->user_id }}</p>
                            <p class="basis-[20%]">{{ $item->ip_address }}</p>
                            <p class="basis-[55%]">{{ $item->user_agent }}</p>
                            <p class="basis-[20%]">{{ $carbon::parse($item->last_activity)->format('F d, Y g:i A') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
    </x-jet-admin-layout>
</div>
