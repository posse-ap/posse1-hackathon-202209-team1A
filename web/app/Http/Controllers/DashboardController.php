<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

const COMMING_SOON_ITEMS_DAYS = 3;
class DashboardController extends Controller
{
    public function index()
    {
        
        $displayLimit = 4;
        $latestItems = Item::latestItems();
        $categoryItems = Category::findCategoriesWithItem();

        $commingSoonItems = Item::where('is_public', true)->whereHas('usageHistories', function ($query) {
            $query->where('is_returned', false)->where('user_id', '<>', Auth::id())->whereDate('return_at', '>=', Carbon::now())->where('return_at', '<=', Carbon::now()->addDays(COMMING_SOON_ITEMS_DAYS));
        })->get();

        return view('dashboard', compact('displayLimit', 'latestItems', 'categoryItems', 'commingSoonItems'));
    }
}
