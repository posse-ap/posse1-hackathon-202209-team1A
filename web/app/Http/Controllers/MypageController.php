<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsageHistory;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MypageController extends Controller
{
    public function index()
    {
        $histories = UsageHistory::where('user_id', Auth::id())->get();
        return view('mypage', compact('histories'));
    }

    public function edit(Request $request)
    {
        $user = User::find(Auth::id());

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('mypage');
    }
}
