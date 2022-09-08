<x-admin-layout>
    <h2 class="text-2xl font-bold text-center mt-8 mb-12">備品カテゴリ</h2>
    <div class="text-right">
        <a
            href="{{ route('admin.categories.create') }}"
            class="PButton-primary">新規作成
        </a>
    </div>
    <table class="table-fixed w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 w-20 text-left">ID</th>
                <th class="px-4 py-2 text-left">名前</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr class="border-y-2">
                    <td class="px-4 py-6">{{ $category->id }}</td>
                    <td class="px-4 py-6">{{ $category->name }}</td>
                    <td class="px-4 py-6 text-right">
                        <form method="POST">
                            @csrf
                            <a
                                class="PButton-primary"
                                href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">編集
                            </a>
                            <input type="hidden" name="_method" value="DELETE">
                            <button
                                type="submit"
                                class="PButton-red ml-6"
                                formaction="{{ route('admin.categories.delete', ['id' => $category->id]) }}">削除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links('vendor.pagination.tailwind2') }}
</x-admin-layout>
