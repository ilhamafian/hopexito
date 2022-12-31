<x-app-layout>
    <div class="relative w-full mx-auto text-white bg-zinc-900">
        <div class="grid min-h-screen grid-cols-10" x->
            <div class="px-4 py-6 lg:pb-56 col-span-full lg:col-span-6">
                <div class="w-full max-w-lg mx-auto">
                    <h1
                        class="relative text-3xl font-medium text-transparent bg-clip-text bg-gradient-to-r from-violet-500 to-orange-500">
                        Secure Checkout<span class="block w-10 h-1 mt-2 bg-rose-500 sm:w-20"></span></h1>
                    <form method="POST" action="{{ route('billplz-store') }}" class="flex flex-col mt-2 space-y-4"
                        x-transition.duration.500ms x-data="{ radio: '' }">
                        @csrf
                        <div class="flex items-center justify-between">
                            <div class="flex flex-row space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-indigo-400">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <h2 class="font-medium text-indigo-400">Delivery Address</h2>
                            </div>
                            <a href="{{ route('profile.show') }}" class="relative inline-flex items-center justify-center px-4 py-2 overflow-hidden text-sm text-white rounded-md shadow-2xl group">
                                <span class="absolute inset-0 w-full h-full transition duration-300 ease-out opacity-0 bg-gradient-to-br from-pink-600 via-purple-700 to-blue-400 group-hover:opacity-100"></span>
                                <!-- Top glass gradient -->
                                <span class="absolute top-0 left-0 w-full bg-gradient-to-b from-white to-transparent opacity-5 h-1/3"></span>
                                <!-- Bottom gradient -->
                                <span class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-white to-transparent opacity-5"></span>
                                <!-- Left gradient -->
                                <span class="absolute bottom-0 left-0 w-4 h-full bg-gradient-to-r from-white to-transparent opacity-5"></span>
                                <!-- Right gradient -->
                                <span class="absolute bottom-0 right-0 w-4 h-full bg-gradient-to-l from-white to-transparent opacity-5"></span>
                                <span class="absolute inset-0 w-full h-full border border-white rounded-md opacity-10"></span>
                                <span class="absolute w-0 h-0 transition-all duration-300 ease-out bg-white rounded-full group-hover:w-56 group-hover:h-56 opacity-5"></span>
                                <span class="relative">Change your address</span>
                                </a>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" type="email" name="email" class="block w-full mt-1"
                                value="{{ Auth::user()->email }}" disabled />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" type="text" name="name" class="block w-full mt-1"
                                value="{{ Auth::user()->name }}" disabled/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="address" value="{{ __('Address') }}" />
                            <x-jet-input id="address" type="text" name="address" class="block w-full mt-1"
                                value="{{ Auth::user()->address }}" disabled/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="postcode" value="{{ __('Postcode') }}" />
                            <x-jet-input id="postcode" type="text" name="postcode" class="block w-full mt-1"
                                value="{{ Auth::user()->postcode }}" disabled/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="state" value="{{ __('State') }}" disabled />
                            <select name="state"
                                class="block w-full p-2.5 bg-neutral-800 border border-neutral-500 rounded-md focus:ring-indigo-500">
                                <option>{{ $state }}</option>
                            </select>
                        </div>
                        <div class="flex flex-row space-x-3 text-indigo-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                            </svg>
                            <h2 class="font-medium">Payment Method (FPX Online Banking)</h2>
                        </div>

                        <div class="grid w-full max-w-screen-sm grid-cols-3 gap-3">
                            <div>
                                <input class="hidden" id="demo" type="radio" name="radio" value="BP-FKR01"
                                    x-on:click="radio = BP-FKR01" x-model="radio">
                                <label class="flex flex-col p-4 border-2 rounded-md cursor-pointer bg-neutral-900"
                                    :class="radio == 'BP-FKR01' ? 'ring ring-indigo-500 border-indigo-500' :
                                        'border-neutral-500'"
                                    for="demo">
                                    <img src="image\fpx-logo\maybank.png" class="h-8" />
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="maybank" type="radio" name="radio" value="MB2U0227"
                                    x-on:click="radio = MB2U0227" x-model="radio">
                                <label class="flex flex-col p-4 border-2 rounded-md cursor-pointer bg-neutral-900"
                                    :class="radio == 'MB2U0227' ? 'ring ring-indigo-500 border-indigo-500' :
                                        'border-neutral-500'"
                                    for="maybank">
                                    <img src="image\fpx-logo\maybank.png" class="h-8" />
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="cimb" type="radio" name="radio" value="BCBB0235"
                                    x-on:click="radio = BCBB0235" x-model="radio">
                                <label class="flex flex-col p-4 border-2 rounded-md cursor-pointer bg-neutral-900"
                                    :class="radio == 'BCBB0235' ? 'ring ring-indigo-500 border-indigo-500' :
                                        'border-neutral-500'"
                                    for="cimb">
                                    <img src="image\fpx-logo\cimb.png" class="h-8" />
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="rhb" type="radio" name="radio" value="RHB0218"
                                    x-on:click="radio = RHB0218" x-model="radio">
                                <label class="flex flex-col p-4 border-2 rounded-md cursor-pointer bg-neutral-900"
                                    :class="radio == 'RHB0218' ? 'ring ring-indigo-500 border-indigo-500' :
                                        'border-neutral-500'"
                                    for="rhb">
                                    <img src="image\fpx-logo\rhb.png" class="h-8" />
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="ambank" type="radio" name="radio" value="AMBB0209"
                                    x-on:click="radio = AMBB0209" x-model="radio">
                                <label class="flex flex-col p-4 border-2 rounded-md cursor-pointer bg-neutral-900"
                                    :class="radio == 'AMBB0209' ? 'ring ring-indigo-500 border-indigo-500' :
                                        'border-neutral-500'"
                                    for="ambank">
                                    <img src="image\fpx-logo\ambank.png" class="h-8" />
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="affin" type="radio" name="radio" value="ABB0233"
                                    x-on:click="radio = ABB0233" x-model="radio">
                                <label class="flex flex-col p-4 border-2 rounded-md cursor-pointer bg-neutral-900"
                                    :class="radio == 'ABB0233' ? 'ring ring-indigo-500 border-indigo-500' :
                                        'border-neutral-500'"
                                    for="affin">
                                    <img src="image\fpx-logo\affin.png" class="h-8" />
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="bsn" type="radio" name="radio" value="BSN0601"
                                    x-on:click="radio = BSN0601" x-model="radio">
                                <label class="flex flex-col p-4 border-2 rounded-md cursor-pointer bg-neutral-900"
                                    :class="radio == 'BSN0601' ? 'ring ring-indigo-500 border-indigo-500' :
                                        'border-neutral-500'"
                                    for="bsn">
                                    <img src="image\fpx-logo\bsn.png" class="h-8" />
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="bank-rakyat" type="radio" name="radio"
                                    value="BKRM0602" x-on:click="radio = BKRM0602" x-model="radio">
                                <label class="flex flex-col p-4 border-2 rounded-md cursor-pointer bg-neutral-900"
                                    :class="radio == 'BKRM0602' ? 'ring ring-indigo-500 border-indigo-500' :
                                        'border-neutral-500'"
                                    for="bank-rakyat">
                                    <img src="image\fpx-logo\bank-rakyat.png" class="h-8" />
                                </label>
                            </div>
                            <div>
                                <input class="hidden" id="uob" type="radio" name="radio" value="UOB0226"
                                    x-on:click="radio = UOB0226" x-model="radio">
                                <label class="flex flex-col p-4 border-2 rounded-md cursor-pointer bg-neutral-900"
                                    :class="radio == 'UOB0226' ? 'ring ring-indigo-500 border-indigo-500' :
                                        'border-neutral-500'"
                                    for="uob">
                                    <img src="image\fpx-logo\uob.png" class="h-8" />
                                </label>
                            </div>
                        </div>
                        <p class="text-sm font-semibold text-center text-gray-500 ">By placing this order you
                            agree
                            to the
                            <a href="#"
                                class="text-indigo-500 underline whitespace-nowrap hover:text-indigo-300">Terms and
                                Conditions</a>
                        </p>
                        <x-jet-button>
                            <span class="p-2 mx-auto">Place Order</span>
                        </x-jet-button>
                    </form>
                </div>
            </div>
            <div class="relative flex flex-col p-6 col-span-full lg:col-span-4">
                <div>
                    <img src="image\checkout.jpg" alt=""
                        class="absolute inset-0 object-cover w-full h-full" />
                    <div
                        class="absolute inset-0 w-full h-full opacity-95 bg-gradient-to-tr from-rose-800 to-indigo-800">
                    </div>
                </div>
                <div class="relative font-mono">
                    <ul class="space-y-3">
                        @foreach ($cart as $cart)
                            <li
                                class="flex justify-between p-4 transition hover:skew-y-1 rounded-xl hover:shadow-lg hover:shadow-orange-500/20 bg-neutral-900">
                                <div class="inline-flex">
                                    <img class="max-h-24" src="{{ $cart->product_image }}" alt="" />
                                    <div class="ml-5">
                                        <p class="font-semibold text-white">{{ $cart->title }}</p>
                                        <p class="text-xs font-medium text-white uppercase text-opacity-80">
                                            {{ $cart->size }}
                                            / {{ $cart->color }}</p>
                                    </div>
                                </div>
                                <p class="font-semibold text-white">RM{{ number_format($cart->price, 2) }} x
                                    {{ $cart->quantity }}</p>
                            </li>
                        @endforeach
                    </ul>
                    <div class="my-5 h-0.5 w-full bg-white bg-opacity-30"></div>
                    <div class="space-y-3 text-md">
                        <p class="flex justify-between text-white"><span>Shipping (JNT
                                Express)</span>
                            <span>RM{{ number_format($delivery, 2) }}</span>
                        </p>
                        <p class="flex justify-between text-white">
                            <span>Subtotal:</span><span> RM{{ number_format($subtotal, 2) }}</span>
                        </p>
                        <p class="flex justify-between text-lg font-bold tracking-wide text-lime-300">
                            <span>Total Price:</span><span>
                                RM{{ number_format($total, 2) }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
