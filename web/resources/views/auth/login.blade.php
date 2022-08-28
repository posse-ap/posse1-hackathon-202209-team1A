<x-guest-layout>
    <x-auth-card>
        <h2 class="text-2xl font-bold text-center mt-8 mb-12">ログイン</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">メールアドレス</label>
                <input class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight" id="email" name="email" type="email" required>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">パスワード</label>
                <input class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight" id="password" name="password" type="password" required>
            </div>

            <div class="text-right py-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-800 font-bold" href="{{ route('password.request') }}">パスワードを忘れましたか？</a>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">ログインしたままにする</span>
                </label>
            </div>

            <div class="flex items-center justify-end flex-col mt-4">
                <button type="submit" class="PButton-primary w-full">ログイン</button>

                <div class="text-center mt-4 text-blue-800 font-bold">
                    <a href="{{ route('register') }}" class="">利用登録はこちら</a>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
