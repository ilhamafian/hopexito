<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="flex justify-between md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-white">{{ __('Cover Image and Bio') }}</h3>
            <p class="mt-1 text-sm text-white">
                {{ __('Fill in your account details for other sites you use and we will display them on your profile.') }}</p>
        </div>
    </div>
    <div class="mt-5 border-2 border-indigo-500 shadow-lg bg-black/50 shadow-rose-500 rounded-2xl">
        <div class="flex flex-col px-4 py-5 sm:p-6 rounded-2xl">
            <form method="POST" action="{{ route('upload-callback') }}" enctype="multipart/form-data" class="">
                @csrf
                <x-jet-label for="cover-image" value="{{ __('Cover Image') }}" />
                <input type="file" id="cover-image" name="cover_image" wire:model.defer="cover_image" class="w-full">
                <x-jet-label for="bio" value="{{ __('Bio') }}" />
                <textarea id="bio" name="bio" rows="4" wire:model.defer="bio"
                    class="mb-4 block p-2.5 w-full caret-teal-500 bg-neutral-800 border border-neutral-500 focus:ring-indigo-500 rounded-md text-white"
                    placeholder="Describe yourself"></textarea>
                <x-jet-button class="float-right">Save</x-jet-button>
            </form>
        </div>
    </div>
    {{-- Include Filepond --}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const fileInput = document.querySelector('input[id="cover-image"]');
        const pond = FilePond.create(fileInput);
        FilePond.setOptions({
            server: {
                url: '{{ route('upload') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
</div>

