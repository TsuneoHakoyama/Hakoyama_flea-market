<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show()
    {
        $items = Item::all();

        return view('index', compact('items'));
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

    public function detailItem(Item $id)
    {
        $item = Item::where('id', $id->id )
                ->with(['categories', 'condition', 'favorites'])
                ->first();
        
        $count = Favorite::where('item_id', $id->id)
                 ->get();

        return view('item-detail', compact('item', 'count'));
    }
}
