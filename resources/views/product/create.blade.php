<x-app-layout>
    <div class="container mx-auto lg:px-5 lg:py-12 bg-neutral-900" x-data="getData()">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data"
            class="flex mx-auto lg:w-3/4 md:w-full">
            @csrf
            <div class="w-1/2 p-8">
                <div class="flex flex-row space-x-3">
                    <div class="relative flex items-center justify-center w-full">
                        <label for="tshirt-file-front"
                            class="flex flex-col items-center justify-center w-full transition bg-gray-700 border-2 border-gray-600 border-dashed rounded-lg cursor-pointer hover:bg-gray-600 hover:border-gray-500">
                            <div class="flex flex-col items-center justify-center p-3">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="text-sm text-gray-400">Click to upload <span class="text-indigo-500">Front design</span></p>
                            </div>
                            <input id="tshirt-file-front" name="image_front" type="file" class="hidden" />
                            {{-- <svg x-cloak x-show="formData.image_front.length > 0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="absolute w-4 h-4 text-lime-400 right-2 top-3">
                                <circle cx="8" cy="8" r="6" fill="#a3e635" />
                            </svg>
                            <svg x-cloak x-show="formData.image_front.length == 0" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="absolute w-4 h-4 text-rose-500 right-2 top-3">
                                <circle cx="8" cy="8" r="6" fill="#f43f5e" />
                            </svg> --}}
                            <input type='hidden' id='front-shirt-dataURL' name='front_shirt' value=''
                                class="hidden" />
                        </label>
                    </div>
                    {{-- <div class="flex items-center justify-center w-full">
                        <label for="tshirt-file-back"
                            class="flex flex-col items-center justify-center w-full transition bg-gray-700 border-2 border-gray-600 border-dashed rounded-lg cursor-pointer hover:bg-gray-600 hover:border-gray-500">
                            <div class="flex flex-col items-center justify-center p-3">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="text-sm text-gray-400">Click to upload <span class="text-indigo-500">Back
                                        design</span></p>
                            </div>
                            <input id="tshirt-file-back" name="image_back" type="file" class="hidden" />
                            <input type='hidden' id='back-shirt-dataURL' name='back_shirt' value=''
                                class="hidden" />
                        </label>
                    </div> --}}
                </div>
                <div class="relative py-2">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block w-full mt-1" type="text" name="title"
                        placeholder="Title related to your artwork" />
                    {{-- <svg x-show="formData.title.length > 0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="absolute w-4 h-4 text-lime-400 right-2 bottom-5">
                        <circle cx="8" cy="8" r="6" fill="#a3e635" />
                    </svg>
                    <svg x-show="formData.title.length == 0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="absolute w-4 h-4 text-rose-500 right-2 bottom-5 ">
                        <circle cx="8" cy="8" r="6" fill="#f43f5e" />
                    </svg> --}}
                </div>
                <div class="relative py-2">
                    <x-jet-label for="tags" value="{{ __('Tags') }}" />
                    <x-jet-input id="tags" class="block w-full mt-1" type="text" name="tags"
                        placeholder="Separate tags with commas" />
                    {{-- <svg x-show="formData.tags.length > 0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="absolute w-4 h-4 text-lime-400 right-2 bottom-5">
                        <circle cx="8" cy="8" r="6" fill="#a3e635" />
                    </svg>
                    <svg x-show="formData.tags.length == 0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="absolute w-4 h-4 text-rose-500 right-2 bottom-5 ">
                        <circle cx="8" cy="8" r="6" fill="#f43f5e" />
                    </svg> --}}
                </div>
                <div class="flex py-2">
                    <div class="flex flex-col w-1/3">
                        <x-jet-label for="" value="{{ __('Tshirt Color') }}" />
                        <div class="space-x-1">
                            <input type="button" class="w-8 h-8 bg-white rounded-full " id="white"></a>
                            <input type="button" class="w-8 h-8 bg-black rounded-full" id="black"></a>
                            <input type="button" class="h-8 w-8 rounded-full bg-[#cabfad]" id="sand"></a>
                        </div>
                    </div>
                    <div class="flex flex-col w-1/3">
                        <x-jet-label for="" value="{{ __('Alignment') }}" />
                        <div>
                            <x-jet-button-utility id="centerH">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </x-jet-button-utility>
                            <x-jet-button-utility id="centerV">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                </svg>
                            </x-jet-button-utility>
                        </div>
                    </div>
                    <div class="flex flex-col w-1/3">
                        <x-jet-label for="" value="{{ __('Size') }}" />
                        <div>
                            <x-jet-button-utility id="A3">
                                A3
                            </x-jet-button-utility>
                            <x-jet-button-utility id="A4">
                                A4
                            </x-jet-button-utility>
                            <x-jet-button-utility id="A5">
                                A5
                            </x-jet-button-utility>
                        </div>
                    </div>
                </div>
                <div class="flex py-2">
                    <div class="relative basis-28">
                        <x-jet-label for="price" value="{{ __('Set the price') }}" />
                        <x-jet-input type="text" id="price" name="price" class="w-24 mt-1" x-model="formData.price"
                           />
                        <svg x-cloak x-show="formData.price > 41" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="absolute w-4 h-4 text-lime-400 right-5 top-12">
                            <circle cx="8" cy="8" r="6" fill="#a3e635" />
                        </svg>
                        <svg x-cloak x-show="formData.price < 42" xmlns="http://www.w3.org/2000/svg" fill="none"
                            x-on:mouseenter="tooltip = true" x-on:mouseleave="tooltip = false" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="absolute w-4 h-4 text-rose-500 right-5 top-12">
                            <circle cx="8" cy="8" r="6" fill="#f43f5e" />
                        </svg>
                        <div x-cloak x-show="tooltip"
                            class="z-50 absolute bg-black border-rose-500 border-2 rounded mt-1 text-xs p-1 text-gray-300">
                            The minimum value for this product is <span class="text-lime-400">RM42</span>
                        </div>
                    </div>
                    <div class="basis-28">
                        <x-jet-label for="commission" value="{{ __('Commission') }}" /><br>
                        <x-jet-input type="text" id="commission" class="w-24 mt-1"
                            x-bind:placeholder="formData.commission" disabled />
                    </div>
                    <div class="basis-28">
                        <x-jet-label for="margin" value="{{ __('Your margin') }}" /><br>
                        <x-jet-input type="text" id="margin" class="w-24 mt-1"
                            x-bind:value="'RM' + (formData.price * 0.15).toFixed(2)" disabled />
                    </div>

                    {{-- Save Product Modal --}}
                    <div class="pt-8" x-data="{ open: false }">
                        <x-jet-button type="button" x-on:click="open = true" onclick="takeshot()">
                            Save Product
                        </x-jet-button>
                        <div x-cloak x-show="open" @keydown.escape.prevent.stop="open = false" role="dialog"
                            aria-modal="true" x-id="['modal-title']" :aria-labelledby="$id('modal-title')"
                            class="fixed inset-0 z-20">
                            <!-- Overlay -->
                            <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-80">
                            </div>
                            <!-- Panel -->
                            <div x-show="open" x-transition @click="open = false"
                                class="relative flex items-center justify-center w-full h-full">
                                <div @click.stop style="max-height: 80vh"
                                    class="z-20 flex w-full max-w-2xl p-8 overflow-y-auto bg-black border-2 border-indigo-500 rounded-2xl shadow-lg shadow-rose-500">
                                    <div class="w-3/4">
                                        <h2 class="text-3xl font-medium text-white" :id="$id('modal-title')">Confirm
                                        </h2>
                                        <p class="mt-2 text-gray-300">This product will appear in the marketplace.
                                        </p>
                                        <div class="flex mt-8 space-x-2">
                                            <x-jet-button type="submit" class="">
                                                Confirm
                                            </x-jet-button>
                                            <button type="button" x-on:click="open = false"
                                                class="px-4 hover:rotate-180  transition duration-500">
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
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Canvas Area --}}
            <div x-data="{ flipped: false }">
                <x-jet-button-utility x-on:click="flipped =! flipped">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </x-jet-button-utility>
                <div class="absolute">
                    <div id="tshirt-front" class="relative bg-neutral-90" x-show="!flipped"
                        x-transition.opacity.0.duration.500ms>
                        <img id="tshirt-front-background" class="w-[452px] bg-white"
                            src="../image/mockup-shirt-front.png" />
                        <div id="drawingArea" class="absolute top-[110px] left-[122px] z-0 w-[210px] h-[280px]">
                            <div class="w-210[px] h-[280px] relative select-none">
                                <canvas id="tshirt-front-canvas" width="210" height="280">

                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute">
                    <div x-cloak id="tshirt-back" class="relative bg-neutral-900" x-show="flipped"
                        x-transition.opacity.0.duration.500ms>
                        <img id="tshirt-back-background" class="w-[452px] bg-white"
                            src="../image/mockup-shirt-back.png" />
                        <div id="drawingArea" class="absolute top-[110px] left-[122px] z-10 w-[210px]z-0 h-[280px]">
                            <div class="w-210[px] h-[280px] relative select-none ">
                                <canvas id="tshirt-back-canvas" width="210" height="280">

                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Include Fabric.js in the page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"
        integrity="sha512-1+czAStluVmzKLZD98uvRGNVbc+r9zLKV4KeAJmvikygfO71u3dtgo2G8+uB1JjCh2GVln0ofOpz9ZTxqJQX/w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://html2canvas.hertzen.com/dist/html2canvas.min.js'></script>
    <script>

        function getData(){
            return {
                formData:{
                    title:"",
                    tags:"",
                    price:"",
                    margin: 0,
                    commission: "15%"
                },
                tooltip:false
            }
        }

        let canvas_front = new fabric.Canvas('tshirt-front-canvas');
        let canvas_back = new fabric.Canvas('tshirt-back-canvas');

        fabric.Object.prototype.cornerSize = 0
        fabric.Object.prototype.borderColor = "rgba(0,0,0,0)"

        var $ = function(id) {
            return document.getElementById(id)
        };

        // Switch shirt color
        $("white").onclick = function() {
            $("tshirt-front-background").style.background = '#fff';
            $("tshirt-back-background").style.background = '#fff';
        }
        $("black").onclick = function() {
            $("tshirt-front-background").style.background = '#000';
            $("tshirt-back-background").style.background = '#000';
        }
        $("sand").onclick = function() {
            $("tshirt-front-background").style.background = '#cabfad';
            $("tshirt-back-background").style.background = '#cabfad';
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
                    canvas_front.centerObject(img);
                    canvas_front.add(img);
                    canvas_front.renderAll();

                    $("centerH").onclick = function() {
                        canvas_front.centerObjectH(img);
                    }
                    $("centerV").onclick = function() {
                        canvas_front.centerObjectV(img);
                    }
                    $("A5").onclick = function() {
                        img.scaleToHeight(70).scaleToWidth(70).center();
                        canvas_front.renderAll();
                    }
                    $("A4").onclick = function() {
                        img.scaleToHeight(120).scaleToWidth(120).center();
                        canvas_front.renderAll();
                    }
                    $("A3").onclick = function() {
                        img.scaleToHeight(140).scaleToWidth(140).center();
                        canvas_front.renderAll();
                    }
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
                canvas_front.remove(canvas_front.getActiveObject());
                canvas_back.remove(canvas_back.getActiveObject());
                $("tshirt-file-front").value = "";
                $("tshirt-file-back").value = "";
            }
        }, false);

        function takeshot() {

            html2canvas($('tshirt-front')).then(
                function(canvas_front) {
                    $('front-shirt-dataURL').value = canvas_front.toDataURL("image/png", 100);
                    console.log(canvas_front.toDataURL("image/png",100));
                })
            /*
            html2canvas($('tshirt-back')).then(
                function(canvas_back) {
                    //  $('back-shirt-dataURL').value = canvas_back.toDataURL("image/png",100);
                })*/
        }
    </script>
</x-app-layout>
