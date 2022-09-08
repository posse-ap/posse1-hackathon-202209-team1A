<div class="text-left mx-4 modal-open" style="width: 300px;">
    <p class="h-6 font-bold w-full">
        @if ($item->is_borrowed())
            {{ $item->latestUsageHistory()->user->name }}さんが利用中（〜{{ $item->latestUsageHistory()->return_at }}）
        @endif
    </p>
    <div class="bg-slate-100 w-full">
        @if (Auth::check())
            <a href="{{ route('items.show', ['id' => $item->id]) }}">
                <img class="object-contain h-48 w-96" src="{{ \Storage::url($item->image_path) }}">
            </a>
        @else
            <div>
                <img class="object-contain h-48 w-96" src="{{ \Storage::url($item->image_path) }}">
            </div>
        @endif
    </div>
    <p class="font-bold py-2 w-full">{{ $item->category->name ?? '' }}</p>
    <p class="w-full">{{ $item->name }}</p>
</div>
