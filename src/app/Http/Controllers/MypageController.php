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
        $sells = Item::where('user_id', $user_id)
                      ->get();
        
        return view('mypage', compact(['info', 'sells']));
    }
}
