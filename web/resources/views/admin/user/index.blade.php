<x-admin-layout>
    <h2 class="text-2xl font-bold text-center mt-8 mb-12">ユーザー</h2>

    <table class="table-fixed w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">管理者</th>
                <th class="px-4 py-2 text-left">名前</th>
                <th class="px-4 py-2 text-left">メールアドレス</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="border-y-2">
                    <td class="px-4 py-6">{{ $user->id }}</td>
                    <td class="px-4 py-6">{{ $user->is_admin ? "はい" : "いいえ" }}</td>
                    <td class="px-4 py-6">{{ $user->name }}</td>
                    <td class="px-4 py-6">{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
