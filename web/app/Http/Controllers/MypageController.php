<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsageHistory;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $histories = UsageHistory::where('user_id', Auth::id())->get();
        return view('mypage', compact('histories'));
    }
}
