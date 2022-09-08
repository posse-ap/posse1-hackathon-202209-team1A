<x-app-layout :keyword="$keyword">

    <div class="grid grid-cols-1 gap-8 mt-8 px-0 md:px-32">
        <div>
            <h1 class="PHeading3 border-l-4 p-2 border-blue-500">「@if (isset($keyword))
                    {{ $keyword }}@else{{ $categoryName }}
                @endif」の備品一覧</h1>
        </div>
        @if (isset($categoryName) && $categoryName == '新着')
            <div>
                <div class="flex items-center pb-3">
                    <p class="mr-3">カテゴリ：</p>
                    <ul class="flex items-center">
                        <li
                            class="@if ($categoryId == 0) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.latestList', ['categoryId' => 0, 'availableId' => 0, 'sortId' => 0]) }}">全て</a>
                        </li>
                        @foreach ($categories as $category)
                            <li
                                class="@if ($categoryId == $category->id) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                                <a
                                    href="{{ route('items.latestList', ['categoryId' => $category->id, 'availableId' => 0, 'sortId' => 0]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex items-center pb-3">
                    <p class="mr-3">状態：</p>
                    <ul class="flex items-center">
                        <li
                            class="@if ($availableId == 0) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.latestList', ['categoryId' => $categoryId, 'availableId' => 0, 'sortId' => 0]) }}">全て</a>
                        </li>
                        <li
                            class="@if ($availableId == 1) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.latestList', ['categoryId' => $categoryId, 'availableId' => 1, 'sortId' => 0]) }}">利用可能</a>
                        </li>
                        <li
                            class="@if ($availableId == 2) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.latestList', ['categoryId' => $categoryId, 'availableId' => 2, 'sortId' => 0]) }}">利用中</a>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center pb-3">
                    <p class="mr-3">並び順：</p>
                    <ul class="flex items-center">
                        <li
                            class="@if ($sortId == 0) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.latestList', ['categoryId' => $categoryId, 'availableId' => $availableId, 'sortId' => 0]) }}">新着順</a>
                        </li>
                        <li
                            class="@if ($sortId == 1) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.latestList', ['categoryId' => $categoryId, 'availableId' => $availableId, 'sortId' => 1]) }}">人気順</a>
                        </li>
                    </ul>
                </div>
            </div>
        @elseif (isset($categoryName) && $categoryName == 'もうすぐ利用できます')
            <div>
                <div class="flex items-center pb-3">
                    <p class="mr-3">カテゴリ：</p>
                    <ul class="flex items-center">
                        <li
                            class="@if ($categoryId == 0) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.commingSoonList', ['categoryId' => 0, 'availableId' => 0, 'sortId' => 0]) }}">全て</a>
                        </li>
                        @foreach ($categories as $category)
                            <li
                                class="@if ($categoryId == $category->id) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                                <a
                                    href="{{ route('items.commingSoonList', ['categoryId' => $category->id, 'availableId' => 0, 'sortId' => 0]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex items-center pb-3">
                    <p class="mr-3">状態：</p>
                    <ul class="flex items-center">
                        <li
                            class="@if ($availableId == 0) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.commingSoonList', ['categoryId' => $categoryId, 'availableId' => 0, 'sortId' => 0]) }}">全て</a>
                        </li>
                        <li
                            class="@if ($availableId == 1) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.commingSoonList', ['categoryId' => $categoryId, 'availableId' => 1, 'sortId' => 0]) }}">利用可能</a>
                        </li>
                        <li
                            class="@if ($availableId == 2) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.commingSoonList', ['categoryId' => $categoryId, 'availableId' => 2, 'sortId' => 0]) }}">利用中</a>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center pb-3">
                    <p class="mr-3">並び順：</p>
                    <ul class="flex items-center">
                        <li
                            class="@if ($sortId == 0) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.commingSoonList', ['categoryId' => $categoryId, 'availableId' => $availableId, 'sortId' => 0]) }}">新着順</a>
                        </li>
                        <li
                            class="@if ($sortId == 1) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.commingSoonList', ['categoryId' => $categoryId, 'availableId' => $availableId, 'sortId' => 1]) }}">人気順</a>
                        </li>
                    </ul>
                </div>
            </div>
        @elseif (isset($keyword))
            <div>
                <div class="flex items-center pb-3">
                    <p class="mr-3">カテゴリ：</p>
                    <ul class="flex items-center">
                        <li
                            class="@if ($categoryId == 0) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.result', ['keyword' => $keyword, 'categoryId' => 0, 'availableId' => 0, 'sortId' => 0]) }}">全て</a>
                        </li>
                        @foreach ($categories as $category)
                            <li
                                class="@if ($categoryId == $category->id) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                                <a
                                    href="{{ route('items.result', ['keyword' => $keyword, 'categoryId' => $category->id, 'availableId' => 0, 'sortId' => 0]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex items-center pb-3">
                    <p class="mr-3">状態：</p>
                    <ul class="flex items-center">
                        <li
                            class="@if ($availableId == 0) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.result', ['keyword' => $keyword, 'categoryId' => $categoryId, 'availableId' => 0, 'sortId' => 0]) }}">全て</a>
                        </li>
                        <li
                            class="@if ($availableId == 1) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.result', ['keyword' => $keyword, 'categoryId' => $categoryId, 'availableId' => 1, 'sortId' => 0]) }}">利用可能</a>
                        </li>
                        <li
                            class="@if ($availableId == 2) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.result', ['keyword' => $keyword, 'categoryId' => $categoryId, 'availableId' => 2, 'sortId' => 0]) }}">利用中</a>
                        </li>
                    </ul>
                </div>
                <div class="flex items-center pb-3">
                    <p class="mr-3">並び順：</p>
                    <ul class="flex items-center">
                        <li
                            class="@if ($sortId == 0) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.result', ['keyword' => $keyword, 'categoryId' => $categoryId, 'availableId' => $availableId, 'sortId' => 0]) }}">新着順</a>
                        </li>
                        <li
                            class="@if ($sortId == 1) PButton-primary-mini @else PButton-gray-mini @endif mr-3">
                            <a
                                href="{{ route('items.result', ['keyword' => $keyword, 'categoryId' => $categoryId, 'availableId' => $availableId, 'sortId' => 1]) }}">人気順</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
        <h2><span class="font-bold">{{ $items->total() }}</span>件見つかりました</h2>
    </div>
    <div class="h-full px-8 sm:px-12 lg:px-24">
        @if (!Auth::check())
            <div class="flex py-4 flex-wrap modal-open">
            @else
                <div class="flex py-4 flex-wrap">
        @endif
        @foreach ($items as $key => $item)
            <x-item-card :item="$item"></x-item-card>
        @endforeach
    </div>
    </div>
    {{ $items->links('vendor.pagination.tailwind2') }}
    <div id="modal-load" class="md:w-2/4 w-11/12 rounded-2xl block modal-load">
        @include('modals.please_login')
    </div>
    <div class="overlay">
    </div>
</x-app-layout>
