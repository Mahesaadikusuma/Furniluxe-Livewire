<div class="">
    <h2 class="text-second font-medium text-2xl">{{ $title }}</h2>
    {{-- Luxury facilities --}}
    <p class="text-justify my-4">
        {{-- The advantage of hiring a workspace with us is that givees you
        comfortable service and all-around facilities. --}}
        {{ $body }}
    </p>

    <div class="flex items-center">
        <a href="{{ $link ? $llink : '#' }}" class="flex items-center gap-2 cursor-pointer">More Info
            <i data-feather="arrow-right"></i>
        </a>
    </div>
</div>
