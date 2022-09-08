<div class="text-left mx-4" style="width: 300px;">
    <p class="h-6 font-bold w-full">
        @if ($item->is_borrowed())
            {{ $item->latestUsageHistory()->user->name }}さんが利用中（〜{{ $item->latestUsageHistory()->return_at }}）
        @endif
    </p>
    <div class="bg-slate-100 w-full">
        <a href="{{ route('items.show', ['id' => $item->id]) }}">
            <img class="object-contain h-48 w-96" src="{{ \Storage::url($item->image_path) }}">
        </a>
    </div>
    <p class="font-bold py-2 w-full">{{ $item->category->name ?? '' }}</p>
    <p class="w-full">{{ $item->name }}</p>
</div>
