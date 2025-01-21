<div {{ $attributes->merge(['class' => 'p-8 h-fit bg-white rounded-lg border border-slate-100 shadow-sm flex flex-col
    gap-y-12 items-center']) }}>
    <h1 class="text-lg font-bold">{{ $title }}</h1>
    <img src="{{ $imgSrc }}" alt="" class="{{ $imgSize }}">
    <div class="flex flex-col gap-y-4 items-center max-w-md">
        <p class="text-center text-sm">{{ $responseText }}</p>
        @if ($showButton)
        <x-button class="w-fit" color="info" onclick="window.location.href='{{ $buttonLink }}'">
            List Survei
        </x-button>
        @endif
    </div>
</div>