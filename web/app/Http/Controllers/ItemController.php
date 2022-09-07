<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show(int $id)
    {
        $item = Item::where('id', $id)->with('category')->first();
        return view('items.show', compact('item'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        return redirect()->route('items.result', ['keyword' => $keyword]);
    }

    public function result($keyword)
    {
        $items = Item::paginate(20);
        $query = Item::query();
        $displayLimit = 4;

        if ($keyword) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach ($wordArraySearched as $value) {
                $query->where('name', 'like', '%' . $value . '%');
            }

            $items = $query->paginate(20);
        }
        return view('items.search', compact('displayLimit', 'items', 'keyword'));
    }
}
