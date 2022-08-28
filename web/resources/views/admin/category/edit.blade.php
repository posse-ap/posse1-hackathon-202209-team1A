<x-admin-layout>
    <h2 class="text-2xl font-bold text-center mt-8 mb-12">備品カテゴリ：編集</h2>
    <div class="flex justify-center">
        <form class="bg-white w-96 px-8 pt-6 pb-8 mb-4" action="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    名前
                </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" id="name" name="name" type="text" value="{{ $category->name }}">
                @if ($errors->has('name'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="flex items-center justify-between py-8">
                <button type="submit" class="PButton-primary w-full">保存</button>
            </div>
        </form>
    </div>
</x-admin-layout>
