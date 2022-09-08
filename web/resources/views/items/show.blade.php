<x-app-layout>
    @auth
        @if ($item->am_borrowing_history())
            <div class="bg-applied-use text-center py-3">
                <p class="text-lime-800 font-bold text-lg">
                    利用申請済みです
                </p>
            </div>
        @endif
    @endauth
    <div class="grid grid-cols-2 gap-8 mt-8 px-0 md:px-32">
        <div>
            <div class="bg-slate-100 text-center">
                <img class="inline-block object-contain h-96 w-96" src="{{ \Storage::url($item->image_path) }}">
            </div>
        </div>
        <div>
            <h3 class="PHeading3 border-b-2 py-6">{{ $item->name }}</h3>
            <div>
                <div class="border-b-2 py-4">
                    @if (!$item->am_borrowing_history())
                        <form action="{{ route('application.create', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            <div class="w-80 mx-auto">
                                <div class="py-4">
                                    <label class="text-gray-700 text-xs">利用期間</label>
                                    <div class="flex items-center">
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                        <input type="hidden" name="item_id" value="{{ intval($item->id) }}">
                                        <input
                                            class="inlin-block text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                            name="start_date" type="date" value="{{ date('Y-m-d') }}"
                                            readonly="readonly">
                                        <span class="px-2">〜</span>
                                        <input
                                            class="inlin-block text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                            name="end_date" type="date">
                                    </div>
                                </div>
                                <div class="py-4">
                                    <button type="submit"
                                        @if ($item->is_borrowed()) class="PButton-disabled w-full" disabled @else 
                                    class="PButton-primary w-full" @endif>
                                        利用申請を行う</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('application.edit', ['id' => $item->am_borrowing_history()->id]) }}"
                            method="POST">
                            @csrf
                            <div class="w-80 mx-auto">
                                <div class="py-4">
                                    <label class="text-gray-700 text-xs">利用期間</label>
                                    <div class="flex items-center">
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                        <input type="hidden" name="item_id" value="{{ intval($item->id) }}">
                                        <input
                                            class="inlin-block text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                            name="start_date" type="date"
                                            value="{{ $item->am_borrowing_history()->start_at }}" readonly="readonly">
                                        <span class="px-2">〜</span>
                                        <input
                                            class="inlin-block text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                            name="end_date" type="date"
                                            value="{{ $item->am_borrowing_history()->return_at }}">
                                    </div>
                                </div>
                                <div class="py-4">
                                    <button type="submit" class="PButton-primary w-full">利用期間を変更する</button>
                                </div>
                            </div>
                        </form>
                        <form class="py-4" action="{{ route('application.returnItem', ['id' => $item->id]) }}"
                            method="POST">
                            <div class="w-80 mx-auto">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->am_borrowing_history()->id }}">
                                <input type="hidden" name="item_id" value="{{ intval($item->id) }}">
                                <button type="submit" class="PButton-red w-full">返却する</button>
                            </div>
                        </form>
                    @endif
                </div>
                <!-- フラッシュメッセージ -->
                @if (session('flash_message'))
                    <div class="flash_message">
                        {{ session('flash_message') }}
                    </div>
                @endif
            </div>
        </div>
        <div>
            <h3 class="PHeading3 border-l-4 p-2 border-blue-500">履歴</h3>
            <table class="w-full">
                <tbody>
                    @foreach ($histories as $history)
                        <tr class="border-y-2">
                            <td class="px-4 py-6 font-bold w-max whitespace-nowrap">
                                @if ($history->is_returned)
                                    返却済み
                                @endif
                            </td>
                            <td class="px-4 py-6 whitespace-nowrap">{{ $history->start_at }}~{{ $history->return_at }}
                            </td>
                            <td class="px-4 py-6">{{ $history->user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h3 class="PHeading3 border-l-4 p-2 border-blue-500">情報</h3>
            <div class="bg-gray-100 mt-4">
                <table class="table-auto">
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 font-bold">備品ID</td>
                            <td class="px-4 py-2">{{ $item->id }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">カテゴリ</td>
                            <td class="px-4 py-2">{{ $item->category->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">登録日時</td>
                            <td class="px-4 py-2">{{ $item->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">提供</td>
                            <td class="px-4 py-2">{{ $item->provider }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">利用目安</td>
                            <td class="px-4 py-2">{{ $item->available_days }}日</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
