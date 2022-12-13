<x-app-layout>
    <div class="w-full p-8 bg-gradient-to-br from-rose-600 to-indigo-500 min-h-96">
        <div class="relative bg-black h-96">
        <img class="absolute left-0 right-0 object-cover w-20 h-20 m-auto rounded-full -bottom-8"
            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
    </div>

    <div class="mt-10 text-center">
        <p class="text-xl font-bold">{{ Auth::user()->name }}</p>
        <p class="flex gap-2 justify-center items-center">Joined {{ Auth::user()->created_at->format('M Y') }}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                stroke="currentColor" class="w-4 h-4 text-cyan-500">
                <circle cx="8" cy="8" r="6" fill="#000" />
            </svg>
            {{ $products->count() }} Designs
        </p>

        <div class="flex justify-center gap-2 my-4">
            @if ($artist->facebook)
                <a href="https://{{ $artist->facebook }}" target="_blank"
                    class="focus:ring focus:ring-indigo-500 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 100 100"
                        class="w-8 h-8 hover:scale-110 transition">
                        <path
                            d="M50.8,3.57A45.75,45.75,0,1,0,96.54,49.32,45.8,45.8,0,0,0,50.8,3.57ZM63.49,30.71a.69.69,0,0,1-.69.69H57.3a2.45,2.45,0,0,0-2.45,2.44V39.6h7.83a.69.69,0,0,1,.68.75l-.68,8.12a.69.69,0,0,1-.69.63H54.85V76.05a.69.69,0,0,1-.69.69H44.31a.69.69,0,0,1-.69-.69V49.1H38.7a.69.69,0,0,1-.69-.69V40.29a.69.69,0,0,1,.69-.69h4.92V31.78A9.88,9.88,0,0,1,53.5,21.9h9.3a.69.69,0,0,1,.69.69Z" />
                    </svg>
                </a>
            @endif
            @if ($artist->twitter)
                <a href="https://{{ $artist->twitter }}" target="_blank"
                    class="focus:ring focus:ring-indigo-500 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"
                        class="w-8 h-8 hover:scale-110 transition">
                        <path
                            d="M22,5.8a8.49,8.49,0,0,1-2.36.64,4.13,4.13,0,0,0,1.81-2.27,8.21,8.21,0,0,1-2.61,1,4.1,4.1,0,0,0-7,3.74A11.64,11.64,0,0,1,3.39,4.62a4.16,4.16,0,0,0-.55,2.07A4.09,4.09,0,0,0,4.66,10.1,4.05,4.05,0,0,1,2.8,9.59v.05a4.1,4.1,0,0,0,3.3,4A3.93,3.93,0,0,1,5,13.81a4.9,4.9,0,0,1-.77-.07,4.11,4.11,0,0,0,3.83,2.84A8.22,8.22,0,0,1,3,18.34a7.93,7.93,0,0,1-1-.06,11.57,11.57,0,0,0,6.29,1.85A11.59,11.59,0,0,0,20,8.45c0-.17,0-.35,0-.53A8.43,8.43,0,0,0,22,5.8Z" />
                    </svg>
            @endif
            @if ($artist->instagram)
                <a href="https://{{ $artist->instagram }}" target="_blank"
                    class="focus:ring focus:ring-indigo-500 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                        class="w-8 h-8 hover:scale-110 transition">
                        <path
                            d="M11 0H5a5 5 0 0 0-5 5v6a5 5 0 0 0 5 5h6a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zm3.5 11c0 1.93-1.57 3.5-3.5 3.5H5c-1.93 0-3.5-1.57-3.5-3.5V5c0-1.93 1.57-3.5 3.5-3.5h6c1.93 0 3.5 1.57 3.5 3.5v6z" />
                        <path
                            d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8zm0 6.5A2.503 2.503 0 0 1 5.5 8c0-1.379 1.122-2.5 2.5-2.5s2.5 1.121 2.5 2.5c0 1.378-1.122 2.5-2.5 2.5z" />
                        <circle cx="12.3" cy="3.7" r=".533" />
                    </svg>
            @endif
            @if ($artist->dribble)
                <a href="https://{{ $artist->dribble }}" target="_blank"
                    class=" focus:ring focus:ring-indigo-500 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 hover:scale-110 transition">
                        <path
                            d="M26 4.9c0-.1 0-.1 0 0C23.3 2.4 19.8 1 16 1c-1.7 0-3.3.3-4.9.8-.2 0-.4.1-.6.2C5 4.2 1 9.7 1 16c0 4.1 1.6 7.7 4.2 10.4l.1.1C8 29.3 11.8 31 16 31c8.3 0 15-6.7 15-15 0-4.4-1.9-8.4-5-11.1zM16 4c2.7 0 5.1.9 7.1 2.4-.6 1-2.2 2.8-5.4 4-1-2.1-2.3-4.2-3.8-6.2.7-.1 1.4-.2 2.1-.2zm-5.1 1.2c1.6 2 2.8 4.1 3.9 6.2-2.6.6-5.8.8-10 .6 1.1-3.1 3.3-5.5 6.1-6.8zM4 16c0-.4 0-.8.1-1.2 1.4.2 2.7.2 3.9.2 3.2 0 5.8-.3 8-.9.2.4.3.8.5 1.2-5.3 1.8-8.6 5.4-10.3 7.6C4.9 21 4 18.6 4 16zm12 12c-2.9 0-5.5-1-7.6-2.7 1.2-1.7 4.1-5.3 9.1-7 1.3 4.4 1.7 7.9 1.8 9.2-1 .3-2.1.5-3.3.5zm3-14.8c3.4-1.4 5.4-3.2 6.4-4.7 1.4 1.7 2.3 3.9 2.6 6.2-3.1-.6-5.9-.6-8.4-.1-.3-.4-.4-.9-.6-1.4zm3.3 13c-.2-1.8-.7-5-1.8-8.7 2.1-.3 4.6-.3 7.3.3-.5 3.5-2.6 6.6-5.5 8.4z" />
                    </svg>
            @endif
            @if ($artist->behance)
                <a href="https://{{ $artist->behance }}" target="_blank"
                    class=" focus:ring focus:ring-rose-500 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"
                        class="w-8 h-8 hover:scale-110 transition">
                        <path
                            d="M20.07,6.35H15V7.76h5.09ZM19,16.05a2.23,2.23,0,0,1-1.3.37A2.23,2.23,0,0,1,16,15.88a2.49,2.49,0,0,1-.62-1.76H22a6.47,6.47,0,0,0-.17-2,5.08,5.08,0,0,0-.8-1.73,4.17,4.17,0,0,0-1.42-1.21,4.37,4.37,0,0,0-2-.45,4.88,4.88,0,0,0-1.9.37,4.51,4.51,0,0,0-1.47,1,4.4,4.4,0,0,0-.95,1.52,5.4,5.4,0,0,0-.33,1.91,5.52,5.52,0,0,0,.32,1.94A4.46,4.46,0,0,0,14.16,17a4,4,0,0,0,1.46,1,5.2,5.2,0,0,0,1.94.34,4.77,4.77,0,0,0,2.64-.7,4.21,4.21,0,0,0,1.63-2.35H19.62A1.54,1.54,0,0,1,19,16.05Zm-3.43-4.12a1.87,1.87,0,0,1,1-1.14,2.28,2.28,0,0,1,1-.2,1.73,1.73,0,0,1,1.36.49,2.91,2.91,0,0,1,.63,1.45H15.41A3,3,0,0,1,15.52,11.93Zm-5.29-.48a3.06,3.06,0,0,0,1.28-1,2.72,2.72,0,0,0,.43-1.58,3.28,3.28,0,0,0-.29-1.48,2.4,2.4,0,0,0-.82-1,3.24,3.24,0,0,0-1.27-.52,7.54,7.54,0,0,0-1.64-.16H2V18.29H8.1a6.55,6.55,0,0,0,1.65-.21,4.55,4.55,0,0,0,1.43-.65,3.13,3.13,0,0,0,1-1.14,3.41,3.41,0,0,0,.37-1.65,3.47,3.47,0,0,0-.57-2A3,3,0,0,0,10.23,11.45ZM4.77,7.86H7.36a4.17,4.17,0,0,1,.71.06,1.64,1.64,0,0,1,.61.22,1.05,1.05,0,0,1,.42.44,1.42,1.42,0,0,1,.16.72,1.36,1.36,0,0,1-.47,1.15,2,2,0,0,1-1.22.35H4.77ZM9.61,15.3a1.28,1.28,0,0,1-.45.5,2,2,0,0,1-.65.26,3.33,3.33,0,0,1-.78.08h-3V12.69h3a2.4,2.4,0,0,1,1.45.41,1.65,1.65,0,0,1,.54,1.39A1.77,1.77,0,0,1,9.61,15.3Z" />
                    </svg>
            @endif
            @if ($artist->pinterest)
                <a href="https://{{ $artist->pinterest }}" target="_blank"
                    class=" focus:ring focus:ring-indigo-500 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2500" height="2500" viewBox="0 0 999.9 999.9"
                        class="w-8 h-8 hover:scale-110 transition">
                        <path
                            d="M0 500c2.6-141.9 52.7-260.4 150.4-355.4S364.6 1.3 500 0c145.8 2.6 265.3 52.4 358.4 149.4 93.1 97 140.3 213.9 141.6 350.6-2.6 140.6-52.7 258.8-150.4 354.5-97.7 95.6-214.2 144.1-349.6 145.4-46.9 0-93.7-7.2-140.6-21.5 9.1-14.3 18.2-30.6 27.3-48.8 10.4-22.1 23.4-63.8 39.1-125 3.9-16.9 9.8-39.7 17.6-68.4 9.1 15.6 24.7 29.9 46.9 43 58.6 27.3 120.4 24.7 185.5-7.8 67.7-39.1 114.6-99.6 140.6-181.6 23.4-85.9 20.5-165.7-8.8-239.2C778.3 277 725.9 224 650.4 191.4c-95-27.3-187.5-24.4-277.3 8.8s-152.3 90.2-187.5 170.9C176.5 401 171 430.7 169 460c-2 29.3-1 57.9 2.9 85.9s13.7 53.1 29.3 75.2 36.5 39.1 62.5 50.8c6.5 2.6 11.7 2.6 15.6 0 5.2-2.6 10.4-13 15.6-31.2 5.2-18.2 7.2-30.6 5.9-37.1-1.3-2.6-3.9-7.2-7.8-13.7-27.3-44.3-36.5-90.8-27.3-139.6 9.1-48.8 29.3-90.2 60.5-124 48.2-43 104.5-66.4 168.9-70.3 64.4-3.9 119.5 13.7 165 52.7 24.7 28.6 40.7 63.1 47.8 103.5s7.2 79.1 0 116.2c-7.2 37.1-19.9 71.9-38.1 104.5-32.6 50.8-71 76.8-115.2 78.1-26-1.3-47.2-11.4-63.5-30.3s-21.2-40.7-14.6-65.4c2.6-14.3 10.4-42.3 23.4-84 13-41.7 20.2-72.9 21.5-93.7-3.9-49.5-26.7-74.9-68.4-76.2-32.6 3.9-56.6 18.6-72.3 43.9s-24.1 54.4-25.4 86.9c3.9 37.8 9.8 63.8 17.6 78.1-14.3 58.6-25.4 105.5-33.2 140.6-2.6 9.1-9.8 37.1-21.5 84s-18.2 82.7-19.5 107.4V957C206.3 914 133.3 851.9 80 770.5 26.7 689.1 0 598.9 0 500z" />
                    </svg>
            @endif
            @if ($artist->deviantart)
                <a href="https://{{ $artist->deviantart }}" target="_blank"
                    class=" focus:ring focus:ring-indigo-500 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                        class="w-7 h-7 hover:scale-110 transition">
                        <path
                            d="M13 0h-3L8.526 2.737a.5.5 0 0 1-.44.263H3v4h2.394a.5.5 0 0 1 .44.737L3 13v3h3l1.474-2.737a.5.5 0 0 1 .44-.263H13V9h-2.394a.5.5 0 0 1-.44-.737L13 3V0z" />
                    </svg>
            @endif
            @if ($artist->tiktok)
                <a href="https://{{ $artist->tiktok }}" target="_blank"
                    class=" focus:ring focus:ring-indigo-500 rounded-full p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="w-8 h-8 hover:scale-110 transition">
                        <path
                            d="M6.977 15.532a2.791 2.791 0 0 0 2.791 2.792 2.859 2.859 0 0 0 2.9-2.757L12.7 3h2.578A4.8 4.8 0 0 0 19.7 7.288v2.995a4.676 4.676 0 0 1-.443.022 4.8 4.8 0 0 1-4.02-2.172v7.4a5.469 5.469 0 1 1-5.469-5.469c.114 0 .226.01.338.017v2.7a2.909 2.909 0 0 0-.338-.034 2.791 2.791 0 0 0-2.791 2.785Z" />
                    </svg>
            @endif
        </div>

    </div>
    </div>
    <div class="grid gap-6 mx-16 lg:grid-cols-4">
        @foreach ($products as $product)
            <a href="{{ route('product.show', $product->id) }}">
                <div class="mt-12 transition duration-500 shadow-sm cursor-pointer hover:scale-105">
                    <img class="border-2 border-indigo-500 shadow-md rounded-3xl shadow-pink-500"
                        src="{{ $product->front_shirt }}">
                    <div class="p-1 mt-4 text-center text-md">
                        <div class="font-bold text-white truncate">
                            {{ $product->title }}
                        </div>
                        <h2 class="text-gray-400 hover:text-cyan-500">By {{ $product->shopname }}</h2>
                        <h2 class="m-2 text-lg text-pink-500">RM{{ number_format($product->price, 2) }}</h2>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>
