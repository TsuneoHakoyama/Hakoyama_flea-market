<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function show()
    {
        $items = Item::all();

        return view('index', compact('items'));
    }

    public function myList()
    {
            $user = Auth::id();
            $items = Item::with(['favorites'])
                     ->whereHas('favorites', function($query) use ($user) {
                        $query->where('user_id', $user);
                     })->get();

            $my_list = 'active';

            return view('index', compact('items', 'my_list'));
    }

    public function search(Request $request)
    {
        $query = Item::query();
        $query = $this->getSearchQuery($request, $query);
        $items = $query->get();

        return view('index', compact('items'));
    }

    private function getSearchQuery($request, $query)
    {
        if (!empty($request->keyword)) {
            $space_conversion = mb_convert_kana($request->keyword, 's');
            $search_words = preg_split('/[\s,]+/', $space_conversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($search_words as $search_word) {
                $query->where(function ($q) use ($search_word) {
                    $q->where('name', 'like', '%' . $search_word . '%')
                        ->orwhere('description', 'like', '%' . $search_word . '%');
                });
            }
        }

        return $query;
    }

    public function detailItem(Item $item_id)
    {
        $item = Item::where('id', $item_id->id )
                ->with(['categories', 'comments', 'company', 'condition', 'favorites'])
                ->first();
        $favorite = Favorite::where('item_id', $item_id->id)
                    ->where('user_id', Auth::id())
                    ->first();

        return view('item-detail', compact('item', 'favorite'));
    }

}
