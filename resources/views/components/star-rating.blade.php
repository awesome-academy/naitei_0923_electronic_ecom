@props([
    'stars' => $stars,
])

<span class="block mt-1 text-yellow-400">
    @for ($i = 1 ; $i <= config('constants.max_ratings'); $i++)
        @if ($i <= $stars)
            <i class="fi fi-ss-star"></i>
        @else
            <i class="fi fi-rs-star"></i>
        @endif
    @endfor
</span>
