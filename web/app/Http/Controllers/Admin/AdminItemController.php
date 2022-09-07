<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemRequest;
use App\Models\Category;
use App\Models\Item;
use Exception;
use Illuminate\Support\Facades\Log;

class AdminItemController extends Controller
{
    /**
     * 備品一覧画面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('category')->simplePaginate(10);
        return view('admin.item.index', compact('items'));
    }

    /**
     * 備品作成画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
    }

    /**
     * 備品登録機能
     *
     * @param  \Illuminate\Http\ItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        try {
            $path = '';
            if (isset($request->image)) {
                $path = $request->file('image')->store('public');
            }

            Item::create([
                'category_id'    => $request->category_id,
                'name'           => $request->name,
                'is_public'      => $request->is_public,
                'image_path'     => $path,
                'available_days' => $request->available_days,
                'provider'       => $request->provider,
            ]);
        } catch (Exception $e) {
            Log::error($e);
        }

        return redirect()->route('admin.items.index');
    }

    /**
     * 備品編集画面
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit', compact(['item', 'categories']));
    }

    /**
     * 備品編集
     *
     * @param  \Illuminate\Http\ItemRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, int $id)
    {
        try {
            $item = Item::find($id);
            $path = $item->image_path;
            if (isset($request->image)) {
                $path = $request->file('image')->store('public');
            }

            Item::where('id', $id)->update([
                'category_id'    => $request->category_id,
                'name'           => $request->name,
                'is_public'      => $request->is_public,
                'image_path'     => $path,
                'available_days' => $request->available_days,
                'provider'       => $request->provider,
            ]);
        } catch (Exception $e) {
            Log::error($e);
        }

        return redirect()->route('admin.items.index');
    }

    public function destroy(int $id)
    {
        Item::where('id', $id)->delete();
        return redirect()->route('admin.items.index');
    }
}
