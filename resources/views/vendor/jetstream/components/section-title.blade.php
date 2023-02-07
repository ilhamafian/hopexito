<div class="flex justify-between md:col-span-1">
    <div class="">
        <h3 class="text-lg font-medium text-indigo-400 ">{{ $title }}</h3>

        <p class="mt-1 text-sm text-white">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
