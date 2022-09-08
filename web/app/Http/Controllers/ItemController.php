<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\UsageHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

const COMMING_SOON_ITEMS_DAYS = 3;

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

        return redirect()->route('items.result', ['keyword' => $keyword, 'categoryId' => 0, 'availableId' => 0, 'sortId' => 0,]);
    }

    public function result($keyword, $categoryId, $availableId, $sortId)
    {
        $items = Item::paginate(10);
        $query = Item::query();
        $categories = Category::all();

        if ($keyword) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach ($wordArraySearched as $value) {
                $query->where('is_public', true)->where('name', 'like', '%' . $value . '%');
            }

            $items = $query->paginate(10);

            if ($categoryId != 0) {
                if ($availableId == 0) {
                    if ($sortId == 0) {
                        $items = $query->where('category_id', $categoryId)->orderBy('created_at', 'desc')->paginate(10);
                    } else {
                        $items = $query->where('category_id', $categoryId)->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                    }
                } elseif ($availableId == 1) {
                    if ($sortId == 0) {
                        $items = $query->where('category_id', $categoryId)->whereDoesntHave('usageHistories', function ($query) {
                            $query->where('is_returned', false);
                        })
                            ->orderBy('created_at', 'desc')->paginate(10);
                    } else {
                        $items = $query->where('category_id', $categoryId)->whereDoesntHave('usageHistories', function ($query) {
                            $query->where('is_returned', false);
                        })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                    }
                } else {
                    if ($sortId == 0) {
                        $items = $query->where('category_id', $categoryId)->whereHas('usageHistories', function ($query) {
                            $query->where('is_returned', false);
                        })
                            ->orderBy('created_at', 'desc')->paginate(10);
                    } else {
                        $items = $query->where('category_id', $categoryId)->whereHas('usageHistories', function ($query) {
                            $query->where('is_returned', false);
                        })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                    }
                }
            } else {
                if ($availableId == 0) {
                    if ($sortId == 0) {
                        $items = $query->orderBy('created_at', 'desc')->paginate(10);
                    } else {
                        $items = $query->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                    }
                } elseif ($availableId == 1) {
                    if ($sortId == 0) {
                        $items = $query->whereDoesntHave('usageHistories', function ($query) {
                            $query->where('is_returned', false);
                        })
                            ->orderBy('created_at', 'desc')->paginate(10);
                    } else {
                        $items = $query->whereDoesntHave('usageHistories', function ($query) {
                            $query->where('is_returned', false);
                        })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                    }
                } else {
                    if ($sortId == 0) {
                        $items = $query->whereHas('usageHistories', function ($query) {
                            $query->where('is_returned', false);
                        })
                            ->orderBy('created_at', 'desc')->paginate(10);
                    } else {
                        $items = $query->whereHas('usageHistories', function ($query) {
                            $query->where('is_returned', false);
                        })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                    }
                }
            }
        }
        return view('items.search', compact('items', 'keyword', 'categoryId', 'availableId', 'sortId', 'categories'));
    }

    public function categoryList($categoryId)
    {
        $items = Item::where('category_id', $categoryId)->where('is_public', true)->paginate(10);
        $categoryName = Category::find($categoryId)->name;
        $keyword = null;

        return view('items.search', compact('items', 'categoryName', 'keyword'));
    }

    public function latestList($categoryId, $availableId, $sortId)
    {
        $categoryName = "新着";
        $keyword = null;
        $categories = Category::all();

        if ($categoryId != 0) {
            if ($availableId == 0) {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->orderBy('created_at', 'desc')->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            } elseif ($availableId == 1) {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereDoesntHave('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })
                        ->orderBy('created_at', 'desc')->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereDoesntHave('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            } else {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })
                        ->orderBy('created_at', 'desc')->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            }
        } else {
            if ($availableId == 0) {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->orderBy('created_at', 'desc')->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            } elseif ($availableId == 1) {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->whereDoesntHave('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })
                        ->orderBy('created_at', 'desc')->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->whereDoesntHave('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            } else {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })
                        ->orderBy('created_at', 'desc')->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            }
        }

        return view('items.search', compact('items', 'categoryName', 'keyword', 'categories', 'categoryId', 'availableId', 'sortId'));
    }

    public function commingSoonList($categoryId, $availableId, $sortId)
    {
        $categoryName = "もうすぐ利用できます";
        $keyword = null;
        $categories = Category::all();

        if ($categoryId != 0) {
            if ($availableId == 0) {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false)->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->latest()->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false)->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            } elseif ($availableId == 1) {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereDoesntHave('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })->whereHas('usageHistories', function ($query) {
                        $query->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->latest()->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereDoesntHave('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })->whereHas('usageHistories', function ($query) {
                        $query->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            } else {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false)->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->latest()->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->where('category_id', $categoryId)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false)->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            }
        } else {
            if ($availableId == 0) {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false)->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->latest()->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false)->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            } elseif ($availableId == 1) {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->whereDoesntHave('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })->whereHas('usageHistories', function ($query) {
                        $query->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->latest()->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->whereDoesntHave('usageHistories', function ($query) {
                        $query->where('is_returned', false);
                    })->whereHas('usageHistories', function ($query) {
                        $query->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->latest()->paginate(10);
                }
            } else {
                if ($sortId == 0) {
                    $items = Item::where('is_public', true)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false)->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->latest()->paginate(10);
                } else {
                    $items = Item::where('is_public', true)->whereHas('usageHistories', function ($query) {
                        $query->where('is_returned', false)->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
                    })->withCount('usageHistories')->orderBy('usage_histories_count', 'desc')->paginate(10);
                }
            }
        }

        return view('items.search', compact('items', 'categoryName', 'keyword', 'categories', 'categoryId', 'availableId', 'sortId'));
    }
}
