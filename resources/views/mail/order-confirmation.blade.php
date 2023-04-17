<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Your order has been shipped.</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #222;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .text-indigo {
            color: #818cf8;
        }

        .text-fuchsia {
            color: #e879f9;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .btn {
            background-color: #6366f1;
            border-radius: 6px;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #818cf8;
        }

        .btn:active {
            background-color: #4f46e5;
        }
    </style>
</head>

<body>
    <div class="container">
        <x-jet-application-logo />
        @if (Str::endsWith($order->name, '(G)'))
            <h3>Dear,
                {{ Str::replaceLast('(G)', '', $order->name) }}
            </h3>
        @else
            <h3>Dear,
                {{ $order->name }}</h3>
        @endif
        <p>Thank you for your purchase. We would like to inform you that your order has been shipped and is currently en route.</p>
        <p>Please find your order details and tracking number below:</p>
        <div class="items">
            @foreach ($order->productOrder as $item)
                <div class="item">
                    <div class="item__content">
                        <h3 class="text-indigo">{{ $item->title }}</h3>
                        <p class="uppercase">{{ $item->size }} / {{ $item->color }}</p>
                        <p class="text-fuchsia">RM{{ number_format($item->price, 2) }} x {{ $item->quantity }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="delivery">
            <h2>Delivery address</h2>
            <p>{{ $order->address }}</p>
            <p>{{ $order->postcode }}</p>
            <p>{{ $order->state }}</p>
        </div>
        <a href="https://www.jtexpress.my/tracking/{!! $order->tracking_number !!}" target="_blank" class="btn">
            Track your order
        </a>
    </div>
</body>

</html>
