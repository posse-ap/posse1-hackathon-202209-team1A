<x-app-layout>

    <div class="grid grid-cols-2 gap-8 mt-8 px-0 md:px-32">
        <div>
            <div class="bg-slate-100 text-center">
                <img class="inline-block object-contain h-96 w-96" src="{{ \Storage::url($item->image_path) }}">
            </div>
        </div>
        <div>
            <h3 class="PHeading3 border-b-2 py-6">{{ $item->name }}</h3>
            <div>
                <form action="", method="POST" class="border-b-2 py-4">
                    @csrf
                    <div class="w-80 mx-auto">
                        <div class="py-4">
                            <label class="text-gray-700 text-xs">利用期間</label>
                            <div class="flex items-center">
                                <input
                                    class="inlin-block text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                    name="start_date" type="date">
                                <span class="px-2">〜</span>
                                <input
                                    class="inlin-block text-sm rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                    name="end_date" type="date">
                            </div>
                        </div>
                        <div class="py-4">
                            <button type="submit" class="PButton-primary w-full">利用申請を行う</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div>
            <h3 class="PHeading3 border-l-4 p-2 border-blue-500">履歴</h3>
            @foreach ($logs as $log)
            @endforeach
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
