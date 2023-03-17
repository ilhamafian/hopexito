@section('title', 'Terms of Services | HopeXito')
<x-app-layout>
    <div class="pt-4">
        <div class="flex flex-col items-center min-h-screen pt-6 mb-24">
            <div class="w-full p-6 mt-6 overflow-hidden prose leading-7 text-sm text-gray-300 max-w-3xl">
                {!! $terms !!}
            </div>
        </div>
    </div>
</x-app-layout>
