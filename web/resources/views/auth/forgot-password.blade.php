<x-guest-layout>
    <x-auth-card>
        <h2 class="text-2xl font-bold text-center mt-8 mb-12">パスワード再設定メールを送る</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">メールアドレス</label>
                <input class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight" id="email" name="email" type="email" required>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="PButton-primary w-full">送信</button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
