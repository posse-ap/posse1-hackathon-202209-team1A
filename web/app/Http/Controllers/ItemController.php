<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemController extends Controller
{
    public function show(int $id)
    {
        $item = Item::where('id', $id)->with('category')->first();
        return view('items.show', compact('item'));
    }
}
