<style>
    .glow {
        top: -10%;
        left: -10%;
        width: 120%;
        height: 120%;
        border-radius: 100%;
    }

    .glow-1 {
        animation: glow1 4s linear infinite;
    }

    .glow-2 {
        animation: glow2 4s linear infinite;
        animation-delay: 100ms;
    }

    .glow-3 {
        animation: glow3 4s linear infinite;
        animation-delay: 200ms;
    }

    .glow-4 {
        animation: glow4 4s linear infinite;
        animation-delay: 300ms;
    }

    @keyframes glow1 {
        0% {
            transform: translate(10%, 10%) scale(1.1);
        }

        25% {
            transform: translate(-10%, 10%) scale(1.1);
        }

        50% {
            transform: translate(-10%, -10%) scale(1.1);
        }

        75% {
            transform: translate(10%, -10%) scale(1.1);
        }

        100% {
            transform: translate(10%, 10%) scale(1.1);
        }
    }

    @keyframes glow2 {
        0% {
            transform: translate(-10%, -10%) scale(1.1);
        }

        25% {
            transform: translate(10%, -10%) scale(1.1);
        }

        50% {
            transform: translate(10%, 10%) scale(1.1);
        }

        75% {
            transform: translate(-10%, 10%) scale(1.1);
        }

        100% {
            transform: translate(-10%, -10%) scale(1.1);
        }
    }

    @keyframes glow3 {
        0% {
            transform: translate(-10%, 10%) scale(1.1);
        }

        25% {
            transform: translate(-10%, -10%) scale(1.1);
        }

        50% {
            transform: translate(10%, -10%) scale(1.1);
        }

        75% {
            transform: translate(10%, 10%) scale(1.1);
        }

        100% {
            transform: translate(-10%, 10%) scale(1.1);
        }
    }

    @keyframes glow4 {
        0% {
            transform: translate(10%, -10%) scale(1.1);
        }

        25% {
            transform: translate(10%, 10%) scale(1.1);
        }

        50% {
            transform: translate(-10%, 10%) scale(1.1);
        }

        75% {
            transform: translate(-10%, -10%) scale(1.1);
        }

        100% {
            transform: translate(10%, -10%) scale(1.1);
        }
    }
</style>
<div class="relative w-full">
    <div class="relative z-0 p-0.5 overflow-hidden rounded-lg">
        <form action="{{ route('search') }}" class="relative z-50 flex rounded-md" method="GET">
            <x-jet-input type="text" class="block w-full" autocomplete="off" name="search"/>
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor"
                class="absolute bottom-0 right-0 w-10 h-10 p-2 text-indigo-500 transition rounded-full cursor-pointer hover:bg-violet-500/40">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            </button>
           
        </form>
        <div class="absolute z-10 bg-gradient-to-r from-pink-500 via-red-500 to-orange-500 glow glow-1 animate-glow1">
        </div>
        <div class="absolute z-20 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 glow glow-2 animate-glow2">
        </div>
        <div
            class="absolute z-30 bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-400 glow glow-3 animate-glow3">
        </div>
        <div
            class="absolute z-40 bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500 glow glow-4 animate-glow4">
        </div>
    </div>
</div>
