<x-admin-layout>
    <h2 class="text-2xl font-bold text-center mt-8 mb-12">備品</h2>
    <div class="text-right">
        <a
            href="{{ route('admin.items.create') }}"
            class="PButton-primary">新規作成
        </a>
    </div>
    <table class="table-fixed w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left w-20">ID</th>
                <th class="px-4 py-2 text-left w-20">公開</th>
                <th class="px-4 py-2 text-left w-48">カテゴリ</th>
                <th class="px-4 py-2 text-left">名前</th>
                <th class="px-4 py-2 text-left w-24">利用目安</th>
                <th class="px-4 py-2 text-left w-48">提供</th>
                <th class="px-4 py-2 text-left w-32">登録日時</th>
                <th class="px-4 py-2 text-left w-60"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr class="border-y-2">
                    <td class="px-4 py-6">{{ $item->id }}</td>
                    <td class="px-4 py-6">{{ $item->is_public ? "はい" : "いいえ" }}</td>
                    <td class="px-4 py-6">{{ $item->category->name ?? '' }}</td>
                    <td class="px-4 py-6">
                        <div class="flex items-center">
                            @if (isset($item->image_path))
                            <div class="mr-4 w-20">
                                <img src="{{ \Storage::url($item->image_path) }}">
                            </div>
                            @endif
                            <span class="w-full">{{ Str::limit($item->name, 40, $end='...') }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-6">{{ $item->available_days }}日</td>
                    <td class="px-4 py-6">{{ $item->provider }}</td>
                    <td class="px-4 py-6">{{ $item->created_at }}</td>
                    <td class="px-4 py-6 text-right">
                        <form method="POST" class="flex">
                            @csrf
                            <a
                                class="PButton-primary"
                                href="{{ route('admin.items.edit', ['id' => $item->id]) }}">編集
                            </a>
                            <input type="hidden" name="_method" value="DELETE">
                            <button
                                type="submit"
                                class="PButton-red ml-6"
                                formaction="{{ route('admin.items.delete', ['id' => $item->id]) }}">削除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->links('vendor.pagination.tailwind2') }}
</x-admin-layout>
