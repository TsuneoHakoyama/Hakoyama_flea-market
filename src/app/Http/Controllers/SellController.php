<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Condition;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $conditions = Condition::all();
        $companies = Company::all();

        return view('sell', compact(['categories', 'companies', 'conditions']));
    }

    public function store(Request $request)
    {
        $dir = 'image';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/'. $dir, $file_name);
        
        $user = Auth::id();
        $param = $request->all();
        unset($param['_token']);
        unset($param['category_id']);

        $param['user_id'] = $user;
        $param['image'] = 'storage/' . $dir . '/' . $file_name;
        $last_inserted_id = DB::table('items')->insertGetId($param);

        $item = Item::find($last_inserted_id);
        $item->categories()->attach($request->category_id);

        return view('put-up-complete');
    }
}
