<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show()
    {
        $items = Item::all();

        return view('index', compact('items'));
    }

    public function detailItem(Item $id)
    {
        $item = Item::where('id', $id->id )
                ->with(['categories', 'condition'])
                ->first();

                return view('item-detail', compact('item'));
    }
}
