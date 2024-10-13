<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();

        return view('admin.index', compact('users'));
    }

    public function userComments($user_id)
    {
        $user = Profile::where('user_id', $user_id)
                     ->first();
        $comments = Comment::where('user_id', $user_id)
                    ->with('item')
                    ->get();

        return view('admin.user-comment', compact(['user','comments']));
    }

    public function removeComment(Request $request)
    {
        Comment::find($request->comment_id)->delete();

        return redirect()->back()->with(['comment_msg' => 'コメントを削除しました']);
    }

    public function removeUser(Request $request)
    {
        User::find($request->user_id)->delete();

        return redirect()->back()->with(['remove_msg' => 'ユーザーを削除しました']);
    }
}
