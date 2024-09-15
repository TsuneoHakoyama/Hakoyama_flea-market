<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile');
    }

    public function store(Request $request)
    {
        $param = $request->all();
    }
    
    public function forModify()
    {
        return view('update-address');
    }

    public function update(Request $request)
    {
        $param = $request->all();
        unset($param['_token']);
        $user = Auth::id();
        Profile::find($user)->update($param);

        return redirect()->route('confirm');
    }
}
