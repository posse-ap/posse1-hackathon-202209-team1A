<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsageHistory;

class AdminUsageHistoryController extends Controller
{
    public function index()
    {
        $usage_histories = UsageHistory::all();
        return view('admin.user_history.index', compact('usage_histories'));
    }
}
