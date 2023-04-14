<x-guest-layout>
    <x-jet-application-logo />
    <div class="max-w-3xl mx-auto my-4 text-white">
        @if (substr($order->name, -1) === 'G')
            {{ substr_replace($order->name, '', -1) }}
            <p>Dear, {{ $order->name }}</p>
        @else
            <p>Dear, {{ $order->name }}</p>
        @endif
        <p>Thank you for placing an order with us, we want to inform that your order has been shipped.</p>
        <p>Your order details and tracking number are as follows:</p>
        <div class="flex-col w-full md:w-3/5">
            @foreach ($order->productOrder as $item)
                <div class="flex p-4 space-x-8">
                    <div class="relative flex-col w-full space-y-1">
                        <p class="text-indigo-400">{{ $item->title }}</p>
                        <p class=uppercase">{{ $item->size }} / {{ $item->color }}
                        </p>
                        <p class="tracking-wider text-fuchsia-400">RM{{ number_format($item->price, 2) }} x
                            {{ $item->quantity }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="relative flex-col w-full p-4 md:w-2/5" x-data="{ id: '{{ $order->id }}', copied: false }">
            <p>Delivery address</p>
            <div class="text-sm text-fuchsia-400">
                <p>{{ $order->address }}</p>
                <p>{{ $order->postcode }}</p>
                <p>{{ $order->state }}</p>
            </div>
            <a href="https://www.jtexpress.my/tracking/{!! $order->tracking_number !!}" target="_blank">
                <x-jet-button-utility type="button" class="mt-2">
                    Track your order
                </x-jet-button-utility>
            </a>
        </div>
    </div>
</x-guest-layout>
