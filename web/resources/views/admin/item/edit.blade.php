<x-admin-layout>
    <h2 class="text-2xl font-bold text-center mt-8 mb-12">備品：編集</h2>
    <div class="flex justify-center">
        <form class="bg-white px-8 pt-6 pb-8 mb-4 w-96 sm:w-1/3"
            action="{{ route('admin.items.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4 mb-10">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="is_public">
                    公開
                </label>
                <div class="flex">
                    <div class="flex items-center mr-8">
                        <input id="public" type="radio" name="is_public" value="{{ true }}"
                            class="w-4 h-4" {{ $item->is_public ? 'checked' : '' }}>
                        <label for="public" class="ml-2 text-sm font-medium">はい</label>
                    </div>
                    <div class="flex items-center">
                        <input id="private" type="radio" name="is_public" value="{{ false }}"
                            class="w-4 h-4" {{ $item->is_public ? '' : 'checked' }}>
                        <label for="private" class="ml-2 text-sm font-medium">いいえ</label>
                    </div>
                </div>
                @if ($errors->has('is_public'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('is_public') }}</p>
                @endif
            </div>

            <div class="mb-4 mb-10">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category_id">
                    カテゴリ
                </label>
                <div class="relative">
                    <select class="block appearance-none w-full text-gray-700 rounded leading-tight focus:outline-none"
                        id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('category_id'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('category_id') }}</p>
                @endif
            </div>

            <div class="mb-4 mb-10">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    名前
                </label>
                <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" id="name"
                    name="name" type="text">{{ $item->name }}</textarea>
                @if ($errors->has('name'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="mb-4 mb-10">
                <label class="block mb-2 text-sm font-medium" for="image">画像</label>
                <figure id="figure" style="display: none">
                    <img src="" alt="" id="figureImage" class="w-60 mx-auto">
                </figure>
                <input class="block w-full text-sm rounded cursor-pointer mt-3" id="image" name="image"
                    type="file">
                @if ($errors->has('image'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('image') }}</p>
                @endif
            </div>

            <div class="mb-4 mb-10">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="available_days">
                    利用目安
                </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                    id="available_days" name="available_days" type="text" value="{{ $item->available_days }}">
                @if ($errors->has('available_days'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('available_days') }}</p>
                @endif
            </div>

            <div class="mb-4 mb-10">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="provider">
                    提供
                </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
                    id="provider" name="provider" type="text" value="{{ $item->provider }}">
                @if ($errors->has('provider'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('provider') }}</p>
                @endif
            </div>

            <div class="mb-4 mb-10">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="provider">登録日時</label>
                <p>{{ $item->created_at }}</p>
            </div>

            <div class="mb-4 mb-10">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="provider">更新日時</label>
                <p>{{ $item->updated_at }}</p>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="PButton-primary w-full">保存</button>
            </div>
        </form>
    </div>
</x-admin-layout>
