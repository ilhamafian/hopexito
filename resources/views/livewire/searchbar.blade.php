<div class="flex gap-2">
    <div class="w-2/5">

        @if (Auth::check())
            <p class="text-lg tracking-wide text-indigo-500 my-2">Recent Searches</p>
            @foreach ($keywords as $id => $list)
                <a href="{{ url('/shop?search=' . urlencode($list)) }}"
                    class="flex items-center gap-4 p-2 group w-full hover:bg-purple-900/50 rounded-lg px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4 group-hover:translate-x-2 transition group-hover:text-cyan-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                    <p class="flex-grow truncate group-hover:text-cyan-400">{{ $list }}</p>
                    <button type="button" wire:click.prevent="deleteSearch('{{ $id }}')" class="flex-shrink">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 justify-end hover:scale-110 hover:text-rose-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                        </svg>
                    </button>
                </a>
            @endforeach
        @endif
        <p class="text-lg tracking-wide text-indigo-500 my-2">Trending Searches</p>
        @foreach ($trending_searches as $list)
            <a href="{{ url('/shop?search=' . urlencode($list)) }}"
                class="flex items-center gap-2 p-2 group w-full hover:bg-fuchsia-900/50 rounded-lg transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 group-hover:text-lime-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                </svg>
                <p class="flex-grow group-hover:text-lime-400">{{ $list }}</p>
            </a>
        @endforeach

    </div>
    <div class="w-3/5 px-2">
        <p class="text-lg tracking-wide text-indigo-500 my-2">Top Designers</p>
        <div class="flex gap-3">
            @foreach ($users as $user)
                <a href="{{ route('people', $user->name) }}"
                    class="p-1 hover:scale-110 bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500 rounded-full transition">
                    <img class="object-cover w-16 h-16 rounded-full" src="{{ $user->profile_photo_url }}"
                        alt="{{ $user->name }}" />
                </a>
            @endforeach
        </div>
        <p class="text-lg tracking-wide text-indigo-500 my-2"></p>

    </div>
</div>
