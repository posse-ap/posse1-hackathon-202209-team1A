<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\UsageHistory;

class ItemController extends Controller
{
    public function show(int $id)
    {
        $item = Item::where('id', $id)->with('category')->first();
        $logs = UsageHistory::where('item_id', $id)->latest()->take(5)->get();
        return view('items.show', compact('item', 'logs'));
    }
}
