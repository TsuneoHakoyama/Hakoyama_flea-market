<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(Item $item_id)
    {
        $item = Item::where('id', $item_id->id)
                ->with(['comments', 'favorites'])
                ->first();

        $comments = Comment::where('item_id', $item_id->id)
                    ->with('user.profile')
                    ->get();

        return view('comment', compact('item', 'comments'));
    }

    public function create(Request $request)
    {

        $comment = $request->all();
        Comment::create($comment);


        return redirect()->back();


    }
}
