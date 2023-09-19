@props(['review' => $review])

<div class="flex py-4 pl-5 border-b-2 border-gray-300">
    <a class="mr-3" href="/">
        <div class="w-12 h-12 inline-block relative rounded-full border border-gray-300">
            <img class="max-w-full max-h-full object-scale-down" src="/storage/default_user.png" />
        </div>
    </a>
    <div class="flex-1">
        <a href="/" class="text-sm">{{ $review->user->full_name }}</a>
        <x-star-rating :stars="$review->star" class="text-base" />
        <p class="text-sm mb-2">{{ $review->created_at }}</p>
        <p class="my-1 text-lg">{{ $review->content }}</p>
    </div>
</div>
