<x-guest-layout>
    <x-auth-card>

        <h2 class="text-2xl font-bold text-center mt-8 mb-12">パスワード再設定</h2>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">メールアドレス</label>
                <input class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight" id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">パスワード</label>
                <input class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight" id="password" name="password" type="password" required>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">パスワード（確認用）</label>
                <input class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight" id="password_confirmation" name="password_confirmation" type="password" required>
            </div>

            <div class="flex flex-col items-center justify-end mt-8">
                <button type="submit" class="PButton-primary w-full">リセット</button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
