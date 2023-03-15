@section('title', $template->category . ' | HopeXito')
<x-app-layout>
    <x-jet-session-message />
    <div class="min-h-screen pb-24 mx-auto bg-neutral-900" x-data="{ modal: false, price: '', checkbox: false, open: false, confirm: false }">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data"
            class="flex flex-col w-full xl:mx-16 xl:flex-row">
            @csrf
            <div class="w-full p-8 lg:px-24 xl:px-0 xl:w-1/3 lg:pt-24">
                <div class="relative flex flex-col">
                    <x-jet-label for="tshirt-file-front" value="{{ __('Front Design') }}" />
                    <div class="w-full">
                        <input id="tshirt-file-front" name="image_front" type="file" />
                        @error('image_front')
                            <p class="absolute w-2 h-2 rounded-full bottom-6 right-3 bg-rose-500"></p>
                        @enderror
                        <input type='hidden' id='front-shirt-dataURL' name='product_image' value=''
                            class="hidden" />
                    </div>
                    <x-jet-label for="tshirt-file-back" value="{{ __('Back Design') }}" />
                    <div class="w-full mt-2">
                        <input id="tshirt-file-back" name="image_back" type="file" />
                        @error('image_back')
                            <p class="absolute w-2 h-2 rounded-full bottom-6 right-3 bg-rose-500"></p>
                        @enderror
                        <input type='hidden' id='back-shirt-dataURL' name='product_image_2' value=''
                            class="hidden" />
                    </div>
                </div>
                <div class="relative py-2">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <div class="relative flex flex-col pl-2 group w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <div class="absolute bottom-0 flex-col hidden mb-4 group-hover:flex">
                            <span
                                class="relative z-10 p-2 leading-none text-white whitespace-no-wrap bg-black shadow-lg text-xs w-[480px]">Use
                                a descriptive title that explains your artwork. This makes it easier for people to find
                                your design based on their searches.</span>
                        </div>
                    </div>
                    <x-jet-input id="title" class="block w-full mt-1" type="text" name="title"
                        placeholder="Title related to your artwork" />
                    @error('title')
                        <p class="absolute mt-1 bottom-4 right-3 text-rose-500">Title is required</p>
                    @enderror
                </div>
                <div class="relative py-2">
                    <x-jet-label for="tags" value="{{ __('Tags') }}" />
                    <div class="relative flex flex-col pl-2 group w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 text-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <div class="absolute bottom-0 hidden mb-4 group-hover:flex">
                            <span
                                class="relative z-10 p-2 leading-none text-white whitespace-no-wrap bg-black shadow-lg text-xs w-[480px]">Tags
                                are another way for your audience to discover your work. Use a maximum of 5 relevant
                                tags per upload, separated by commas. Example: panda, bear, snake</span>
                        </div>
                    </div>
                    <x-jet-input id="tags" class="block w-full mt-1" type="text" name="tags"
                        placeholder="Separate tags with commas" />
                    @error('tags')
                        <p class="absolute mt-1 bottom-4 right-3 text-rose-500">Tags are required</p>
                    @enderror
                </div>
                <div class="flex flex-col py-4 md:flex-row">
                    <div class="flex flex-col basis-1/3">
                        <div class="flex">
                            <x-jet-label for="" value="{{ __('Preview Color') }}" />
                            <div class="relative flex flex-col pl-2 group">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                <div class="absolute bottom-0 hidden mb-6 group-hover:flex">
                                    <span
                                        class="relative z-10 p-2 text-xs leading-none text-white whitespace-no-wrap bg-black shadow-lg w-96">Select
                                        a preview color that best represents your design and enhances its overall
                                        appearance.</span>
                                </div>
                            </div>
                        </div>
                        <div class="space-x-1">
                            @foreach ($colors as $color)
                                <button type="button" class="rounded-full w-7 h-7"
                                    style="background-color:{{ $color }}" id="{{ $color }}"></button>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-col basis-1/3">
                        <div class="flex">
                            <x-jet-label for="" value="{{ __('Available Color') }}" />
                            <div class="relative flex flex-col pl-2 group">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                <div class="absolute bottom-0 flex-col hidden mb-6 group-hover:flex">
                                    <span
                                        class="relative z-10 p-2 text-xs leading-none text-white whitespace-no-wrap bg-black shadow-lg w-96">Sometimes
                                        designs do not fit with every color. Choose
                                        the colors that would be available for your product.</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            @foreach ($colors as $color)
                                @if ($color == 'White')
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-white"
                                        value="{{ $color }}" />
                                @endif
                                @if ($color == 'Gray')
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-[#808080]"
                                        value="{{ $color }}" />
                                @endif
                                @if ($color == 'Black')
                                    <x-jet-checkbox id="color" name="color[]" class="p-3.5 bg-[#000]"
                                        value="{{ $color }}" />
                                @endif
                            @endforeach
                            @error('color')
                                <p class="w-2 h-2 rounded-full bg-rose-500"></p>
                            @enderror
                        </div>
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
                <div class="flex flex-col" x-show="open == false">
                    <x-jet-label for="" value="{{ __('Size') }}" />
                    <input type="range"
                        class="h-2 mx-2 mt-2 rounded-full appearance-none cursor-pointer bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
                        id="resize" />
                </div>
                <div class="flex flex-col" x-show="open == true">
                    <x-jet-label for="" value="{{ __('Size') }}" />
                    <input type="range"
                        class="h-2 mx-2 mt-2 rounded-full appearance-none cursor-pointer bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"
                        id="resize_2" />
                </div>
                <div class="flex gap-2 py-2 mt-4">
                    <div class="relative basis-1/3">
                        <x-jet-label for="price" value="{{ __('Set the price') }}" />
                        <x-jet-input type="text" id="price" name="price" class="block w-full mt-1"
                            x-model="price" />
                        @error('price')
                            <p class="absolute w-2 h-2 rounded-full bottom-10 right-3 bg-rose-500"></p>
                        @enderror
                        @error('price')
                            <p class="mt-1 text-rose-500">Min RM{{ $template->min }}</p>
                        @enderror
                        <input type="hidden" name="commission"
                            x-bind:value="(price * {{ $template->commission / 100 }}).toFixed(2)" />
                    </div>
                    <div class="basis-1/3">
                        <x-jet-label for="commission" value="{{ __('Commission') }}" /><br>
                        <x-jet-input type="text" id="commission" class="block w-full mt-1"
                            x-bind:placeholder="'{{ $template->commission }}' + '%'" disabled />
                    </div>
                    <div class="basis-1/3">
                        <x-jet-label for="margin" value="{{ __('Your margin') }}" /><br>
                        <x-jet-input type="text" id="margin" class="block w-full mt-1 text-indigo-400"
                            x-bind:value="'RM' + (price * {{ $template->commission / 100 }}).toFixed(2)" disabled />
                    </div>
                </div>
                <div class="flex gap-3 py-3">
                    <x-jet-checkbox x-model="checkbox" x-on:click="checkbox != checkbox" />
                    <p class="text-xs text-justify text-gray-400">I have the right to sell products containing this
                        artwork,
                        including (1) any featured company's
                        name or logo, (2) any featured person's name or face, (3) any featured words or images
                        created by someone else, and (4) does not contain any offensive or mature images.</p>
                </div>
                {{-- Save Product Modal --}}
                <div class="py-2">
                    @if ($errors->any())
                        <p class="my-2 text-rose-500">Error occured, please double check.</p>
                    @endif
                    <x-jet-button type="button" x-bind:disabled="!checkbox"
                        x-on:click="open = false; modal = true; takeshot(); open != open; setTimeout(() => { open = !open; }, 300); confirm == true; setTimeout(() => { confirm = true; }, 1500);"
                        class="w-full py-3">
                        <span class="mx-auto">Save Product</span>
                    </x-jet-button>
                    <div x-cloak x-show="modal == true" @keydown.escape.prevent.stop="modal = false; confirm = false"
                        class="fixed inset-0 z-50">
                        <!-- Overlay -->
                        <div x-show="modal" x-transition.opacity class="fixed inset-0 bg-black/90 rounded-xl">
                        </div>
                        <!-- Panel -->
                        <div x-show="modal" x-transition x-on:click="modal = false; confirm = false"
                            class="relative flex items-center justify-center w-full h-full">
                            <div @click.stop style="max-height: 80vh"
                                class="z-20 flex w-full p-8 px-12 overflow-y-auto border-2 border-indigo-500 shadow-md md:w-1/3 bg-zinc-900 rounded-2xl shadow-rose-500/50">
                                <div class="w-3/4">
                                    <h2 class="text-3xl font-medium text-white" :id="$id('modal-title')">Confirm
                                    </h2>
                                    <p class="mt-2 text-gray-300">This product will appear in the marketplace.
                                    </p>
                                    <div class="flex mt-8 space-x-2">
                                        <svg x-show="confirm == false" viewBox="0 0 24 24"
                                            class="w-6 h-6 text-indigo-400 animate-spin">
                                            <path fill="currentColor"
                                                d="M12,4V2A10,10 0 0,0 2,12H4A8,8 0 0,1 12,4Z" />
                                        </svg>
                                        <x-jet-button type="submit" class="" x-show="confirm == true">
                                            Confirm
                                        </x-jet-button>
                                        <button type="button" x-on:click="modal = false"
                                            class="px-4 transition duration-500 hover:rotate-180">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                class="w-6 h-6 text-white hover:rotate-180 hover:text-rose-500">
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
                @unless($template->category != 'Shirt')
                    <x-jet-input type="hidden" value="{{ $template->category }}" class="hidden" name="category" />
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
                        <div class="" x-show="open == true" x-transition:enter.duration.300ms>
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
                @endunless
                @unless($template->category != 'Totebag')
                    <x-jet-input type="hidden" value="'{{ $template->category }}'" class="hidden" name="category" />
                    <div>
                        <div class="absolute">
                            <div id="tshirt-front" class="relative bg-neutral-90">
                                <img id="tshirt-front-background" class="w-[550px] bg-white"
                                    src="{{ asset('storage/mockup-image/' . $template->mockup_image) }}"
                                    alt="" />
                                <div id="drawingArea" class="absolute top-[194px] left-[154px] z-0 w-[240px] h-[290px]">
                                    <div class="w-[240px] h-[290px] relative select-none">
                                        <canvas id="tshirt-front-canvas" width="240" height="290" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endunless
                @unless($template->category != 'Oversized')
                <x-jet-input type="hidden" value="{{ $template->category }}" class="hidden" name="category" />
                    <div>
                        <div class="" x-show="open == false" x-transition:enter.duration.300ms>
                            <div id="tshirt-front" class="relative w-[880px] h-[900px] -p-[0.5px]">
                                <img id="tshirt-front-background" class="w-[880px] h-[900px] mx-auto bg-white"
                                    src="{{ asset('storage/mockup-image/' . $template->mockup_image)  }}"
                                    alt="" />
                                <div id="drawingArea" class="absolute top-52 left-[270px] z-0 w-[360px] h-[525px]">
                                    <div class="w-[360px] h-[525px] relative select-none">
                                        <canvas id="tshirt-front-canvas" width="360" height="525" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="" x-show="open == true" x-transition:enter.duration.300ms>
                            <div id="tshirt-back" class="relative -p-[0.5px] w-[880px] h-[900px]">
                                <img id="tshirt-back-background" class="w-[880px] h-[900px] mx-auto bg-white"
                                    src="{{ asset('storage/mockup-image/' . $template->mockup_image_2) }}"
                                    alt="" />
                                <div id="drawingArea" class="absolute top-44 left-[270px] z-0 w-[360px] h-[525px]">
                                    <div class="w-[360px] h-[525px] relative select-none">
                                        <canvas id="tshirt-back-canvas" width="360" height="525" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endunless
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
