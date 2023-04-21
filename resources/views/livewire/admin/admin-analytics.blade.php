@inject('carbon', 'Carbon\Carbon')
<div class="flex">
    <x-jet-admin-sidebar />
    <x-jet-admin-layout>
        <div class="grid grid-cols-3 gap-12 text-center text-white">
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Average Product Price(RM)
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-3xl">
                    {{ number_format($averagePrice, 2) }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Sales(RM)
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-3xl">
                    {{ number_format($totalSales, 2) }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Commission(RM)
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-3xl">
                    {{ number_format($totalCommission, 2) }}
                </div>
            </x-jet-admin-card>
        </div>
        <div class="grid grid-cols-4 gap-12 mt-8 text-center text-white">
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Product
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-4xl">
                    {{ $totalProducts }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Product Sold
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-3xl">
                    {{ $totalSold }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Users
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-3xl">
                    {{ $totalUsers }}
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <x-jet-admin-header>
                    Total Artists
                </x-jet-admin-header>
                <div class="block p-2 mt-4 text-3xl">
                    {{ $totalArtists }}
                </div>
            </x-jet-admin-card>
        </div>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-header>Sales per Month</x-jet-header>
            <div class="grid grid-cols-6">
                @foreach ($orders as $order)
                <div class="flex flex-col items-center">
                    <p class="bg-violet-600 rounded-md px-2 py-0.5">{{ date('F', mktime(0, 0, 0, $order->month, 1)) }}</p> 
                    <p class="mt-2 tracking-wider text-md text-lime-400">RM{{ number_format($order->total_amount, 2) }}</p>
                </div>
            @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border/>
        <x-jet-admin-card>
            <x-jet-header>Products Sold per Month</x-jet-header>
            <div class="grid grid-cols-6">
                @foreach ($totalSoldPerMonth as $sold)
                <div class="flex flex-col items-center">
                    <p class="bg-violet-600 rounded-md px-2 py-0.5">{{ date('F', mktime(0, 0, 0, $sold->month, 1)) }}</p> 
                    <p class="mt-2 tracking-wider text-md text-lime-400">{{ $sold->total_quantity }}</p>
                </div>
            @endforeach
            </div>
        </x-jet-admin-card>
        <x-jet-section-border />
        <div class="grid grid-cols-2 gap-12 text-center text-white" x-data="{ x: 0 }">
            <x-jet-admin-card>
                <div class="overflow-y-scroll h-[500px]">
                    <x-jet-header>Product Leaderboard</x-jet-header>
                    @foreach ($products as $item)
                        <a class="flex flex-col m-3" href="{{ route('product.show', $item->slug) }}">
                            <div class="relative group">
                                <div
                                    class="absolute transition duration-1000 rounded-lg opacity-25 inset-0.5 bg-gradient-to-r from-purple-600 to-pink-600 blur group-hover:opacity-100 group-hover:duration-200">
                                </div>
                                <div class="relative flex items-center justify-between px-6 py-4 bg-black rounded-lg">
                                    <p class="text-white">{{ $item->title }}</p>
                                    <div class="flex items-center gap-4">
                                        <p class="transition text-fuchsia-400 group-hover:text-orange-400">
                                            {{ $item->shopname }}</p>
                                        <div class="px-6 py-2 rounded-lg bg-rose-500">
                                            {{ $item->sold }} sold
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </x-jet-admin-card>
            <x-jet-admin-card>
                <div class="overflow-y-scroll h-[500px]">
                    <x-jet-header>Commission Leaderboard</x-jet-header>
                    @foreach ($wallets as $wallet)
                        <a class="flex flex-col m-3" href="{{ route('people', $wallet->name) }}">
                            <div class="relative group">
                                <div
                                    class="absolute inset-0.5 transition duration-1000 rounded-lg opacity-25 bg-gradient-to-r from-purple-600 to-pink-600 blur group-hover:opacity-100 group-hover:duration-200">
                                </div>
                                <div class="relative flex items-center justify-between px-6 py-4 bg-black rounded-lg">
                                    <p class="text-white">{{ $wallet->name }}</p>
                                    <div class="flex items-center gap-4">
                                        <p class="transition text-fuchsia-400 group-hover:text-orange-400">
                                            RM {{ number_format($wallet->balance, 2) }}</p>
                                        <div class="px-6 py-2 rounded-lg bg-rose-500">
                                            RM {{ number_format($wallet->commission, 2) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </x-jet-admin-card>
        </div>
        <x-jet-section-border />
        <x-jet-admin-card>
            <x-jet-header>Trending Search</x-jet-header>
            <div class="grid grid-cols-5 gap-3">
                @foreach ($searches as $item)
                    <div class="relative group">
                        <div
                            class="absolute transition duration-1000 rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur group-hover:opacity-100 group-hover:duration-200">
                        </div>
                        <div class="relative flex items-center justify-between px-6 py-4 bg-black rounded-lg">
                            <p class="text-white">{{ $item->keyword }}</p>
                            <p class="px-2 py-0.5 text-white bg-purple-500 rounded-md">{{ $item->count }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-jet-admin-card>
    </x-jet-admin-layout>
</div>
