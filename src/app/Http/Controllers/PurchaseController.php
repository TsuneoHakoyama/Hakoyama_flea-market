<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Profile;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PurchaseController extends Controller
{
    public function confirm($item_id)
    {
        $item = Item::where('id', $item_id)
                ->first();

        $address = Profile::where('user_id', Auth::id())
                   ->first();

        return view('purchase', compact('item', 'address'));
    }

    public function purchase(Request $request)
    {
        $param = $request->all();

        Purchase::create($param);

        return view('purchase-complete');
    }
}
