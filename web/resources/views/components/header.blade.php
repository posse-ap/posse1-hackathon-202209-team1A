<header class="bg-white shadow px-8 sm:px-12 lg:px-24">
    <div class="flex justify-between h-20 items-center">
        <div class="flex">
            <a href="{{ route('dashboard') }}" class="flex items-end">
                <img src="/img/logo.png" alt="logo"><span class="font-bold">ライブラリ</span>
            </a>
            <div class="ml-12">
                <form class="flex items-center shadow" action="{{ route('items.search') }}" method="POST">
                    <div class="container flex mx-auto">
                        @csrf
                        <div class="relative">
                            <input type="text" class="px-8 py-2 border-slate-300 rounded w-80" placeholder="キーワードで検索"
                                name="keyword" @if(isset($keyword)) value="{{ $keyword  }}"@endif>
                            <button type="submit" class="w-6 h-6 text-gray-600 absolute top-2 left-2">
                                <svg class="w-full" fill="#C6C9CC" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Navigation -->
        <div>
            @if (Auth::check())
            @if (Auth::user()->is_admin)
            <x-nav-link :href="route('admin.items.index')">
                {{ __('管理画面') }}
            </x-nav-link>
            @endif
            <x-nav-link :href="route('mypage')">
                {{ __('マイページ') }}
            </x-nav-link>
            @else
            <x-nav-link :href="route('login')">
                {{ __('ログイン') }}
            </x-nav-link>
            @endif
        </div>
    </div>
</header>
