<div class="text-left mx-4" style="width: 300px;">
    <div class="bg-slate-100">
        <a href="{{ route('items.show', ['id' => $item->id]) }}">
            <img class="object-contain h-48 w-96" src="{{ \Storage::url($item->image_path) }}">
        </a>
    </div>
    <p class="font-bold py-2">{{ $item->category->name  ?? '' }}</p>
    <p>{{ $item->name }}</p>
</div>
