<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsageHistory;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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

    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        if($request->new_password !== $request->new_password_confirmation)
        {
            return redirect()->route('mypage')->with('warning','パスワードが違います。');
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('mypage')->with('status','パスワードの変更が完了しました。');
    }
}
