<x-app-layout :keyword="$keyword">

    <div class="grid grid-cols-1 gap-8 mt-8 px-0 md:px-32">
        <div>
            <h1 class="PHeading3 border-l-4 p-2 border-blue-500">備品一覧</h1>
        </div>
        <h2><span class="font-bold">{{ $items->total() }}</span>件見つかりました</h2>
    </div>
    <div class="h-full px-8 sm:px-12 lg:px-24">
        <div class="flex py-4">
            @foreach ($items as $key => $item)
                @if ($key < $displayLimit)
                    <x-item-card :item="$item"></x-item-card>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
