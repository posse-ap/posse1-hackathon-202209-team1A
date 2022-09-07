<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\UsageHistory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show(int $id)
    {
        $item = Item::find($id);
        if (!$item->is_public) { 
            abort(404); 
        }
        $histories = UsageHistory::where('item_id', $id)->latest()->take(5)->get();
        return view('items.show', compact('item', 'histories'));
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

        if ($keyword) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach ($wordArraySearched as $value) {
                $query->where('is_public', true)->where('name', 'like', '%' . $value . '%');
            }

            $items = $query->paginate(20);
        }
        return view('items.search', compact('items', 'keyword'));
    }

    public function categoryList($categoryId)
    {
        $items = Item::where('category_id', $categoryId)->where('is_public', true)->paginate(20);
        $categoryName = Category::find($categoryId)->name;
        $keyword = null;

        return view('items.search', compact('items', 'categoryName', 'keyword'));
    }

    public function latestList()
    {
        $items = Item::where('is_public', true)->orderBy('created_at', 'desc')->paginate(20);
        $categoryName = "新着";
        $keyword = null;

        return view('items.search', compact('items', 'categoryName', 'keyword'));
    }
}
