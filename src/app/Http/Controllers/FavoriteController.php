<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function create($item_id)
    {

        $user_id = Auth::id();
        $param = [
            'user_id' => $user_id,
            'item_id' => $item_id,
        ];
        Favorite::create($param);

        return redirect()->back();
    }

    public function delete($item_id)
    {
        Favorite::where('user_id', Auth::id())
        ->where('item_id', $item_id)
        ->delete();

        return redirect()->back();
    }
}
