<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function sellList()
    {
        $user_id = Auth::id();
        $info = Profile::find($user_id);
        $items = Item::where('user_id', $user_id)
                      ->get();
        
        return view('mypage', compact(['info', 'items']));
    }

    public function buyList()
    {
        $user_id = Auth::id();
        $info = Profile::find($user_id);
        $items = Item::with('purchases')->whereHas('purchases', function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();

        $buy_list = 'active';
        return view('mypage', compact(['info', 'items', 'buy_list']));
    }
}
