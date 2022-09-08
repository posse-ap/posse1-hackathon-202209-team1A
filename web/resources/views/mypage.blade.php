<x-app-layout>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden">
            <div class="my-10">
                <h2 class="text-2xl font-bold text-center mt-8 mb-12">ユーザー情報</h2>
                <form method="POST" action="{{ route('mypage.edit') }}">
                    @csrf
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">メールアドレス</label>
                        <input
                            class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight"
                            name="email">
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">お名前</label>
                        <input
                            class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight"
                            name="name">
                    </div>

                    <div class="flex items-center justify-end flex-col mt-8">
                        <button type="submit" class="PButton-primary w-full">ユーザー情報を更新</button>
                    </div>
                </form>
            </div>

            <div class="my-10">
                <h2 class="text-2xl font-bold text-center mt-8 mb-12">パスワード</h2>
                @if (session('warning'))
                    <p class="text-red-600 mb-4">
                        {{ session('warning') }}
                    </p>
                @endif
                <form method="POST" action="{{ route('mypage.passwordUpdate') }}">
                    @csrf

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="new_password">パスワード</label>
                        <input
                            class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight"
                            name="new_password" type="password">
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2"
                            for="new_password_confirmation">パスワード（確認用）</label>
                        <input
                            class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight"
                            name="new_password_confirmation" type="password">
                    </div>

                    <div class="flex items-center justify-end flex-col mt-8">
                        <button type="submit" class="PButton-primary w-full">パスワードを変更</button>
                    </div>
                </form>
                @if (session('status'))
                    <p class="mt-8 text-green-600">
                        {{ session('status') }}
                    </p>
                @endif
            </div>
        </div>
        <div class="my-10 px-20">
            <h2 class="text-2xl font-bold text-center mt-8 mb-12">履歴</h2>
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
                            <td class="px-4 py-6">{{ $history->item->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white overflow-hidden">
            <div class="my-10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="text-center">
                        <button type="submit" class="PButton-red w-full">ログアウト</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
