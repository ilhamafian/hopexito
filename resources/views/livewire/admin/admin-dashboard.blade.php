<div class="flex">
    <x-jet-admin-sidebar />
    <div class="w-full bg-fixed bg-cover">
        <div class="flex flex-col min-h-screen p-8 space-y-4 bg-black bg-opacity-40">
            <div
                class="p-4 shadow-lg bg-clip-padding backdrop-filter backdrop-blur-md bg-white/10 rounded-xl shadow-indigo-500/50">
                <h2 class="text-xl tracking-wider text-white">List of Artists</h2>
                <div class="flex gap-4 mt-4">
                    @foreach ($artists as $artist)
                        <a href="{{ route('people', $artist->name) }}">
                            <img class="object-cover w-20 h-20 transition rounded-full shadow-lg hover:scale-105 hover:shadow-indigo-500/50 "
                                src="{{ $artist->profile_photo_url }}" alt="{{ $artist->name }}" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
