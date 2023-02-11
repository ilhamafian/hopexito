<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-1">
            <x-jet-admin-card>
                <x-jet-header>List of Designers</x-jet-header>
                <div class="flex flex-col gap-2 m-4">
                    <div class="w-full p-2 rounded-lg cursor-pointer bg-black/50">
                        <div class="flex items-center text-center">
                            <p class="basis-[20%] text-left"><span class="px-3 py-1 rounded-md bg-violet-500">Name</span>
                            </p>
                            <p class="basis-[20%] text-left"><span class="px-3 py-1 rounded-md bg-violet-500">Email</span>
                            </p>
                            <p class="basis-[7%]"><span class="px-3 py-1 rounded-md bg-violet-500">PFP</span>
                            </p>
                            <p class="basis-[7%]"><span class="px-3 py-1 rounded-md bg-violet-500">CI</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Address</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Commission</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Balance</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Status</span>
                            </p>
                            <p class="basis-[12%]"><span class="px-3 py-1 rounded-md bg-violet-500">Action</span>
                            </p>
                        </div>
                    </div>
                    @foreach ($artists as $artist)
                        <div class="w-full p-2 rounded-lg bg-black/50">
                            <div class="flex items-center text-center">
                                <p class="basis-[20%] text-left">{{ $artist->name }}</p>
                                <p class="basis-[20%] text-left">{{ $artist->email }} </p>
                                @if ($artist->profile_photo_path)
                                    <p class="basis-[7%] text-green-500">Yes</p>
                                @else
                                    <p class="basis-[7%] text-rose-500">NULL</p>
                                @endif
                                @if ($artist->artist->cover_image)
                                    <p class="basis-[7%] text-green-500">Yes</p>
                                @else
                                    <p class="basis-[7%] text-rose-500">NULL</p>
                                @endif
                                @if ($artist->address)
                                    <p class="basis-[12%] text-green-500">Yes</p>
                                @else
                                    <p class="basis-[12%] text-rose-500">NULL</p>
                                @endif
                                <p class="basis-[12%]">
                                    {{ $artist->wallet->commission }}
                                </p>
                                <p class="basis-[12%]">
                                    {{ $artist->wallet->balance }}
                                </p>
                                @if ($artist->wallet->status == 1)
                                    <p class="basis-[12%] text-green-500">1</p>
                                @else
                                    <p class="basis-[12%] text-rose-500">2</p>
                                @endif
                                <p class="basis-[12%]">
                                    <x-jet-button wire:click="deleteArtist('{{ $artist->id }}')">
                                        Delete
                                      </x-jet-button>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-jet-admin-card>
        </div>
    </x-jet-admin-layout>
</div>
