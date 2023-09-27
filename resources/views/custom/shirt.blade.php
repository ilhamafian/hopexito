@section('title', $template->category . ' | HopeXito')
<x-app-layout>
    <div class="min-h-screen pb-24 mx-auto bg-neutral-900" x-data="{ modal: false, price: '', checkbox: false, open: false, confirm: false, sizechart: false }">
        <div class="pt-4 mx-16">
            <div class="flex items-center gap-2 ml-2 text-white">
                <a href="{{ route('product.index') }}"
                    class="p-1 px-2 transition rounded-md hover:bg-indigo-500/50">Product Selection</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" />
                </svg>
                <p class="text-indigo-400">Standard Tee</p>
            </div>
        </div>
        <form method="POST" action="{{ route('upload.custom') }}" enctype="multipart/form-data"
            class="flex flex-col w-full xl:mx-16 xl:flex-row">
            @csrf
            <div class="w-full p-8 lg:px-24 xl:px-0 xl:w-1/3 lg:pt-12">
                <div class="relative flex flex-col">
                    <x-jet-label for="tshirt-file-front" value="{{ __('Front Design') }}" />
                    <div class="w-full">
                        <input id="tshirt-file-front" name="custom_image_front" type="file" />
                        @error('custom_image_front')
                            <p class="absolute w-2 h-2 rounded-full bottom-6 right-3 bg-rose-500"></p>
                        @enderror
                        <input type='hidden' id='front-shirt-dataURL' name='custom_product_image' value=''
                            class="hidden" />
                    </div>
                    <x-jet-label for="tshirt-file-back" value="{{ __('Back Design') }}" />
                    <div class="w-full mt-2">
                        <input id="tshirt-file-back" name="custom_image_back" type="file" />
                        @error('custom_image_back')
                            <p class="absolute w-2 h-2 rounded-full bottom-6 right-3 bg-rose-500"></p>
                        @enderror
                        <input type='hidden' id='back-shirt-dataURL' name='custom_product_image_2' value=''
                            class="hidden" />
                    </div>
                </div>
                <div class="flex flex-col gap-3 py-4 md:flex-row">
                    <div class="flex flex-col basis-2/3" x-show="open == false">
                        <x-jet-label for="" value="{{ __('Size Adjustment') }}" />
                        <input type="range"
                            class="h-2 mx-2 mt-2 rounded-full appearance-none cursor-pointer bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
                            id="resize" />
                    </div>
                    <div class="flex flex-col basis-2/3" x-show="open == true">
                        <x-jet-label for="" value="{{ __('Size Adjustment') }}" />
                        <input type="range"
                            class="h-2 mx-2 mt-2 rounded-full appearance-none cursor-pointer bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"
                            id="resize_2" />
                    </div>
                    <div class="flex flex-col basis-1/3">
                        <x-jet-button-custom type="button" id="flip" x-on:click="open =! open">
                            <p x-show="open == false">Flip to Back</p>
                            <p x-show="open == true">Flip to Front</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </x-jet-button-custom>
                    </div>
                </div>
                <div class="flex flex-col" x-data="{ color: '' }">
                    <div class="flex items-center gap-2">
                        <x-jet-label for="" value="{{ __('Choose Color') }}" />
                        @error('color')
                            <p class="w-2 h-2 rounded-full bg-rose-500"></p>
                        @enderror
                    </div>
                    <div class="flex flex-row gap-2 my-2">
                        @foreach ($colors as $color)
                            <div class="w-20">
                                <input type="radio" name="color" id="{{ $color }}"
                                    value="{{ $color }}" class="hidden"
                                    x-on:click="color = '{{ $color }}'" x-model="color" />
                                <label for="{{ $color }}"
                                    :class="color == '{{ $color }}' ?
                                        'border-indigo-500 text-lime-400 transition' :
                                        'border-white '"
                                    class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">{{ $color }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col mt-2" x-data="{ size: '' }">
                    <div class="flex items-center gap-2">
                        <x-jet-label for="" value="{{ __('Choose Size') }}" />
                        @error('size')
                            <p class="w-2 h-2 rounded-full bg-rose-500"></p>
                        @enderror
                    </div>
                    <div class="flex flex-row gap-2 my-2">
                        <div class="w-14">
                            <input type="radio" name="size" id="XS" value="XS" class="hidden"
                                x-on:click="size = 'XS'" x-model="size" />
                            <label for="XS"
                                :class="size == 'XS' ? 'border-indigo-500 text-lime-400 transition' :
                                    'border-white '"
                                class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">XS</label>
                        </div>
                        <div class="w-14">
                            <input type="radio" name="size" id="S" value="S" class="hidden"
                                x-on:click="size = 'S'" x-model="size" />
                            <label for="S"
                                :class="size == 'S' ? 'border-indigo-500 text-lime-400 transition' :
                                    'border-white '"
                                class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">S</label>
                        </div>
                        <div class="w-14">
                            <input type="radio" name="size" id="M" value="M" class="hidden"
                                x-on:click="size = 'M'" x-model="size" />
                            <label for="M"
                                :class="size == 'M' ? 'border-indigo-500 text-lime-400 transition' :
                                    'border-white '"
                                class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">M</label>
                        </div>
                        <div class="w-14">
                            <input type="radio" name="size" id="L" value="L" class="hidden"
                                x-on:click="size = 'L'" x-model="size" />
                            <label for="L"
                                :class="size == 'L' ? 'border-indigo-500 text-lime-400 transition' :
                                    'border-white '"
                                class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">L</label>
                        </div>
                        <div class="w-14">
                            <input type="radio" name="size" id="XL" value="XL" class="hidden"
                                x-on:click="size = 'XL'" x-model="size" />
                            <label for="XL"
                                :class="size == 'XL' ? 'border-indigo-500 text-lime-400 transition' :
                                    'border-white '"
                                class="grid p-2 text-sm text-white transition border-2 cursor-pointer place-items-center hover:scale-105">XL</label>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-4 my-6 md:flex-row">
                    <div class="flex items-center justify-between px-4 rounded-md w-80 sm:w-auto md:px-0 ring-4 ring-indigo-500"
                        x-data="{
                            quantity: 1,
                            minus(value) {
                                this.quantity = parseInt(this.quantity);
                                (this.quantity == 1) ? this.quantity = 1: this.quantity -= value;
                            },
                            plus(value) {
                                this.quantity = parseInt(this.quantity);
                                this.quantity += value;
                            }
                        }">
                        <svg x-on:click="minus(1)" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="m-3 cursor-pointer w-7 h-7 text-lime-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                        </svg>
                        <input type="text" name="quantity" x-model="quantity"
                            class="w-16 text-lg text-center text-white bg-transparent border-none" />
                        <svg x-on:click="plus(1)" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="m-3 cursor-pointer w-7 h-7 text-lime-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </div>
                {{-- Save Product Modal --}}
                <div class="py-2 mt-4">
                    @if ($errors->any())
                        <p class="my-2 text-rose-500">Error occured, please double check.</p>
                    @endif
                    <x-jet-button type="button"
                        x-on:click="open = false; modal = true; takeshot(); open != open; setTimeout(() => { open = !open; }, 300); confirm == true; setTimeout(() => { confirm = true; }, 1500);"
                        class="w-full py-3 mt-2">
                        <span class="mx-auto">Proceed</span>
                    </x-jet-button>
                    <div x-cloak x-show="modal == true" @keydown.escape.prevent.stop="modal = false; confirm = false"
                        class="fixed inset-0 z-50">
                        <!-- Overlay -->
                        <div x-show="modal" x-transition.opacity class="fixed inset-0 bg-black rounded-xl">
                        </div>
                        <!-- Panel -->
                        <div x-show="modal" x-transition x-on:click="modal = false; confirm = false"
                            class="relative flex items-center justify-center w-full h-full">
                            <div @click.stop style="max-height: 80vh"
                                class="z-20 flex w-full p-8 px-12 overflow-y-auto border-2 border-indigo-500 shadow-md md:w-1/3 bg-zinc-900 rounded-2xl shadow-rose-500/50">
                                <div class="w-3/4">
                                    <h2 class="text-3xl font-medium text-white" :id="$id('modal-title')">Proceed
                                    </h2>
                                    <p class="mt-2 text-gray-300">
                                    </p>
                                    <div class="flex mt-8 space-x-2">
                                        <svg x-show="confirm == false" viewBox="0 0 24 24"
                                            class="w-6 h-6 text-indigo-400 animate-spin">
                                            <path fill="currentColor"
                                                d="M12,4V2A10,10 0 0,0 2,12H4A8,8 0 0,1 12,4Z" />
                                        </svg>
                                        <x-jet-button type="submit" class="" x-show="confirm == true">
                                            Go to preview
                                        </x-jet-button>
                                        <button type="button" x-on:click="modal = false"
                                            class="px-4 transition duration-500 hover:rotate-180">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                class="w-6 h-6 text-white hover:text-rose-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Mockup template --}}
            <div class="">
                <x-jet-input type="hidden" value="" class="hidden" name="user_id" />
                <x-jet-input type="hidden" value="" class="hidden" name="price" />
                <div>
                    <div class="" x-show="open == false" x-transition:enter.duration.300ms>
                        <div id="tshirt-front" class="relative w-[880px] h-[900px] -p-[0.5px]">
                            <img id="tshirt-front-background" class="w-[880px] h-[900px] mx-auto bg-white"
                                src="{{ asset('storage/mockup-image/' . $template->mockup_image) }}"
                                alt="" />
                            <div id="drawingArea" class="absolute top-52 left-60 z-0 w-[405px] h-[525px]">
                                <div class="w-[405px] h-[525px] relative select-none">
                                    <canvas id="tshirt-front-canvas" width="405" height="525" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div x-cloak class="" x-show="open == true" x-transition:enter.duration.300ms>
                        <div id="tshirt-back" class="relative -p-[0.5px] w-[880px] h-[900px]">
                            <img id="tshirt-back-background" class="w-[880px] h-[900px] mx-auto bg-white"
                                src="{{ asset('storage/mockup-image/' . $template->mockup_image_2) }}"
                                alt="" />
                            <div id="drawingArea" class="absolute top-52 left-60 z-0 w-[405px] h-[525px]">
                                <div class="w-[405px] h-[525px] relative select-none">
                                    <canvas id="tshirt-back-canvas" width="405" height="525" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- Include Fabric.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"
        integrity="sha512-1+czAStluVmzKLZD98uvRGNVbc+r9zLKV4KeAJmvikygfO71u3dtgo2G8+uB1JjCh2GVln0ofOpz9ZTxqJQX/w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Include html2canvas --}}
    <script src='https://html2canvas.hertzen.com/dist/html2canvas.min.js'></script>
    {{-- Include Filepond --}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        // Filepond Init
        const fileInput = document.querySelector('input[id="tshirt-file-front"]');
        const fileInputBack = document.querySelector('input[id="tshirt-file-back"]');
        const pond = FilePond.create(fileInput);
        const pond_2 = FilePond.create(fileInputBack);

        FilePond.setOptions({
            server: {
                url: '{{ route('upload') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
        // Fabric Init
        let canvas = new fabric.Canvas('tshirt-front-canvas');
        let canvas_2 = new fabric.Canvas('tshirt-back-canvas');

        fabric.Object.prototype.cornerSize = 0
        fabric.Object.prototype.borderColor = "rgba(0,0,0,0)"

        var $ = function(id) {
            return document.getElementById(id)
        };
        // Switch shirt color
        function setTshirtFrontBackground(color) {
            $("tshirt-front-background").style.background = color;
        }

        function setTshirtBackBackground(color) {
            $("tshirt-back-background").style.background = color;
        }
        $("White").onclick = function() {
            setTshirtFrontBackground('#fff');
            setTshirtBackBackground('#fff');
        }
        $("Black").onclick = function() {
            setTshirtFrontBackground('#000');
            setTshirtBackBackground('#000');
        }
        $("Gray").onclick = function() {
            setTshirtFrontBackground('#808080');
            setTshirtBackBackground('#808080');
        }

        // When the user clicks on upload a custom picture (Front)  
        $('tshirt-file-front').addEventListener("change", function(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var imgObj = new Image();
                imgObj.src = event.target.result;
                // When the picture loads, create the image in Fabric.js
                imgObj.onload = function() {
                    var img = new fabric.Image(imgObj);
                    img.scaleToHeight(150);
                    img.scaleToWidth(150);
                    canvas.centerObject(img);
                    canvas.add(img);
                    canvas.renderAll();
                    var slider = $("resize");

                    function onSliderChange(value) {
                        var sizePercent = value / 400;
                        img.scale(sizePercent).center().setCoords();
                        canvas.renderAll();
                    }
                    slider.addEventListener("input", function() {
                        onSliderChange(slider.value);
                    });
                };
            };
            // If the user selected a picture, load it
            if (e.target.files[0]) {
                reader.readAsDataURL(e.target.files[0]);
            }
        }, false);

        $('tshirt-file-back').addEventListener("change", function(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var imgObj = new Image();
                imgObj.src = event.target.result;
                // When the picture loads, create the image in Fabric.js
                imgObj.onload = function() {
                    var img = new fabric.Image(imgObj);
                    img.scaleToHeight(150);
                    img.scaleToWidth(150);
                    canvas_2.centerObject(img);
                    canvas_2.add(img);
                    canvas_2.renderAll();
                    var slider = $("resize_2");

                    function onSliderChange(value) {
                        var sizePercent = value / 400;
                        img.scale(sizePercent).center().setCoords();
                        canvas_2.renderAll();
                    }
                    slider.addEventListener("input", function() {
                        onSliderChange(slider.value);
                    });
                };
            };
            // If the user selected a picture, load it
            if (e.target.files[0]) {
                reader.readAsDataURL(e.target.files[0]);
            }
        }, false);

        // When the user selects a picture that has been added and press the DEL key
        // The object will be removed !
        document.addEventListener("keydown", function(e) {
            var keyCode = e.keyCode;

            if (keyCode == 46) {
                canvas.remove(canvas.getActiveObject());
                canvas_back.remove(canvas_back.getActiveObject());
                $("tshirt-file-front").value = "";
                $("tshirt-file-back").value = "";
            }
        }, false);

        // Capture dataurl
        function takeshot() {
            setTimeout(function() {
                html2canvas($('tshirt-front')).then(function(canvas) {
                    $('front-shirt-dataURL').value = canvas.toDataURL("image/png", 100);
                    console.log($('front-shirt-dataURL').value);

                    // add a delay of 100ms before taking screenshot of the back
                    setTimeout(function() {
                        html2canvas($('tshirt-back')).then(function(canvas_2) {
                            $('back-shirt-dataURL').value = canvas_2.toDataURL("image/png",
                                100);
                            console.log($('back-shirt-dataURL').value);
                        });
                    }, 350);
                });
            }, 100);
        }
    </script>
</x-app-layout>
