<div x-cloak x-data="sidebar()" class="relative flex items-start">
    <div class="transition-all duration-300">
        <div class="flex justify-end">
            <button @click="sidebarOpen = !sidebarOpen"
                :class="{ 'hover:bg-gray-300': !sidebarOpen, 'hover:bg-gray-700': sidebarOpen }"
                class="w-8 p-1 mx-3 my-2 transition-all duration-300 rounded-full focus:outline-none">
                <svg viewBox="0 0 20 20" class="w-6 h-6 fill-current"
                    :class="{ 'text-gray-600': !sidebarOpen, 'text-gray-300': sidebarOpen }">
                    <path x-show="!sidebarOpen" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="sidebarOpen" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <div x-cloak wire:ignore :class="{ 'w-56': sidebarOpen, 'w-0': !sidebarOpen }"
        class="z-30 block w-56 h-full min-h-screen overflow-x-hidden overflow-y-auto text-gray-400 transition-all duration-300 ease-in-out bg-zinc-900">
        <div class="flex flex-col items-stretch justify-between h-full">
            <div class="flex flex-col flex-shrink-0 w-full">
                <div class="flex items-center justify-center px-8 py-3 text-center">
                    <p class="text-lg leading-normal text-gray-200 focus:outline-none focus:ring">Admin</p>
                </div>
                <nav>
                    <div class="flex-grow overflow-x-hidden cursor-pointer md:block md:overflow-y-auto" 
                        :class="{ 'opacity-1': sidebarOpen, 'opacity-0': !sidebarOpen }">
                        <a href="{{ route('dashboard') }}" class="flex items-center justify-start px-4 py-3 m-2 text-gray-200 rounded-xl hover:bg-gradient-to-r from-indigo-800/80 via-fuchsia-800/80 to-red-800/80 focus:bg-transparent focus:ring focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                            </svg>
                            <span class="mx-4">Dashboard</span>
                        </a>
                        <a href="{{ route('admin.analytics') }}" class="flex items-center justify-start px-4 py-3 m-2 text-gray-200 rounded-xl hover:bg-gradient-to-r from-indigo-800/80 via-fuchsia-800/80 to-red-800/80 focus:bg-transparent focus:ring focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"   
                                    d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                            </svg>
                            <span class="mx-4">Analytics</span>
                        </a>
                        <a href="{{ route('admin.orders') }}" class="flex items-center justify-start px-4 py-3 m-2 text-gray-200 rounded-xl hover:bg-gradient-to-r from-indigo-800/80 via-fuchsia-800/80 to-red-800/80 focus:bg-transparent focus:ring focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                            </svg>
                            <span class="mx-4">Orders</span>
                        </a>
                    </div>
                </nav>
            </div>
            <div>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a class="flex items-center justify-start px-4 py-3 m-2 text-gray-200 rounded-xl hover:bg-gradient-to-r from-pink-500/80 via-red-500/80 to-yellow-500/80 focus:bg-transparent focus:ring focus:ring-indigo-500"
                    href="{{ route('logout') }}" @click.prevent="$root.submit();" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>
                        <span class="mx-4">Logout</span>
                    </a>
                </form>
             
            </div>
        </div>
        <script>
            function sidebar() {
                return {
                    sidebarOpen: true,
                    sidebarProductMenuOpen: false,
                    openSidebar() {
                        this.sidebarOpen = true
                    },
                    closeSidebar() {
                        this.sidebarOpen = false
                    },
                    sidebarProductMenu() {
                        if (this.sidebarProductMenuOpen === true) {
                            this.sidebarProductMenuOpen = false
                            window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                        } else {
                            this.sidebarProductMenuOpen = true
                            window.localStorage.setItem('sidebarProductMenuOpen', 'open');
                        }
                    },
                    checkSidebarProductMenu() {
                        if (window.localStorage.getItem('sidebarProductMenuOpen')) {
                            if (window.localStorage.getItem('sidebarProductMenuOpen') === 'open') {
                                this.sidebarProductMenuOpen = true
                            } else {
                                this.sidebarProductMenuOpen = false
                                window.localStorage.setItem('sidebarProductMenuOpen', 'close');
                            }
                        }
                    },
                }
            }
        </script>
    </div>
</div>
