@section('title', 'Privacy Policy | HopeXito')
<x-app-layout>
    <div class="pt-4 bg-zinc-900">
        <div class="flex flex-col items-center min-h-screen pt-6 sm:pt-0">
            <div class="w-full p-6 mt-6 overflow-hidden prose bg-white shadow-md sm:max-w-2xl sm:rounded-lg">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-app-layout>
