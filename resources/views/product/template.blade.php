@section('title', $template->category . ' | HopeXito')
<x-app-layout>
    <x-jet-session-message />
    <div class="min-h-screen py-12 mx-auto bg-neutral-900" x-data="{ modal3: false, price: '', checkbox: false }">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data"
            class="flex flex-col w-full mx-auto lg:flex-row lg:w-3/4">
            @csrf
            <div class="w-full p-8 lg:w-1/2">
                <div class="relative flex flex-row">
                    <div class="w-full">
                        <input id="tshirt-file-front" name="image_front" type="file" />
                        @error('image_front')
                            <p class="absolute w-2 h-2 rounded-full bottom-6 right-3 bg-rose-500"></p>
                        @enderror
                        <input type='hidden' id='front-shirt-dataURL' name='product_image' value=''
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
                                are how your audience finds your work. Use 5 relevant tags per upload. Make sure to
                                separate tags with commas. Example: panda, bear, snake</span>
                        </div>
                    </div>
                    <x-jet-input id="tags" class="block w-full mt-1" type="text" name="tags"
                        placeholder="Separate tags with commas" />
                    @error('tags')
                        <p class="absolute mt-1 bottom-4 right-3 text-rose-500">Tags are required</p>
                    @enderror
                </div>
                <div class="flex flex-col py-2 md:flex-row">
                    <div class="flex flex-col basis-1/3">
                        <div class="flex">
                            <x-jet-label for="" value="{{ __('Default Color') }}" />
                            <div class="relative flex flex-col pl-2 group">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                <div class="absolute bottom-0 hidden mb-6 group-hover:flex">
                                    <span
                                        class="relative z-10 p-2 leading-none text-white whitespace-no-wrap bg-black shadow-lg w-96 text-xs">Select
                                        a default color that best represents your design and enhances its overall
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
                                        class="relative z-10 p-2 leading-none text-white whitespace-no-wrap bg-black shadow-lg w-96 text-xs">Sometimes designs do not fit with every color. Choose
                                        the colors that you want to be available for your design</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            @foreach ($colors as $color)
                                <x-jet-checkbox name="color[]"
                                    class="p-3.5 checked:text-indigo-500 border-0 rounded-md"
                                    style="background-color:{{ $color }}" value="{{ $color }}" />
                            @endforeach
                            @error('color')
                                <p class="w-2 h-2 rounded-full bg-rose-500"></p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col basis-1/3 ">
                        <x-jet-label for="" value="{{ __('Size') }}" />
                        <input type="range"
                            class="h-2 mx-2 mt-2 rounded-full appearance-none cursor-pointer bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
                            id="resize" />
                    </div>
                </div>
                <div class="flex gap-2 py-2">
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
                    <p class="text-justify text-gray-400 text-xs">I have the right to sell products containing this
                        artwork,
                        including (1) any featured company's
                        name or logo, (2) any featured person's name or face, (3) any featured words or images
                        created by someone else, and (4) does not contain any offensive or mature images.</p>
                </div>
                {{-- Save Product Modal --}}
                <div class="py-2">
                    <x-jet-button type="button" x-bind:disabled="!checkbox" x-on:click="modal3 = true; takeshot()"
                        class="w-full py-3">
                        <span class="mx-auto">Save Product</span>
                    </x-jet-button>
                    <x-jet-modal-custom-3>
                        <div class="w-3/4">
                            <h2 class="text-3xl font-medium text-white" :id="$id('modal-title')">Confirm
                            </h2>
                            <p class="mt-2 text-gray-300">This product will appear in the marketplace.
                            </p>
                            <div class="flex mt-8 space-x-2">
                                <x-jet-button type="submit" class="">
                                    Confirm
                                </x-jet-button>
                                <button type="button" x-on:click="modal3 = false"
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
                        <div class="w-1/4">
                            <lord-icon src="https://cdn.lordicon.com/ridbdkcb.json" trigger="loop"
                                delay="0" colors="primary:#f43f5e,secondary:#6366f1"
                                style="width:150px;height:150px">
                            </lord-icon>
                        </div>
                    </x-jet-modal-custom-3>
                </div>
            </div>
            {{-- Mockup template --}}
            @unless($template->category != 'Shirt')
                <x-jet-input type="hidden" value="{{ $template->category }}" class="hidden" name="category" />
                <div>
                    <div class="absolute">
                        <div id="tshirt-front" class="relative bg-neutral-90">
                            <img id="tshirt-front-background" class="w-[550px] bg-white"
                                src="{{ asset('storage/mockup-image/' . $template->mockup_image) }}" alt="" />
                            <div id="drawingArea" class="absolute top-[120px] left-[146px] z-0 w-[260px] h-[360px]">
                                <div class="w-[260px] h-[360px] relative select-none">
                                    <canvas id="tshirt-front-canvas" width="260" height="360" />
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
                                src="{{ asset('storage/mockup-image/' . $template->mockup_image) }}" alt="" />
                            <div id="drawingArea" class="absolute top-[194px] left-[154px] z-0 w-[240px] h-[290px]">
                                <div class="w-[240px] h-[290px] relative select-none">
                                    <canvas id="tshirt-front-canvas" width="240" height="290" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endunless
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
        const pond = FilePond.create(fileInput);
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
        fabric.Object.prototype.cornerSize = 0
        fabric.Object.prototype.borderColor = "rgba(0,0,0,0)"
        var $ = function(id) {
            return document.getElementById(id)
        };
        // Switch shirt color
        $("White").onclick = function() {
            $("tshirt-front-background").style.background = '#fff';
        }
        $("Black").onclick = function() {
            $("tshirt-front-background").style.background = '#000';
        }
        $("Gray").onclick = function() {
            $("tshirt-front-background").style.background = '#808080';
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
                    img.scaleToHeight(100);
                    img.scaleToWidth(100);
                    canvas.centerObject(img);
                    canvas.add(img);
                    canvas.renderAll();
                    var slider = $("resize");

                    function onSliderChange(value) {
                        var sizePercent = value / 300;
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
            html2canvas($('tshirt-front')).then(
                function(canvas) {
                    $('front-shirt-dataURL').value = canvas.toDataURL("image/png", 100);
                })
        }
    </script>
</x-app-layout>
