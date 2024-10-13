<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class SendMailController extends Controller
{
    public function send(Request $request)
    {
        $email = $request->email;
        Mail::to($email)->send(new TestEmail());

        if(count(Mail::failures()) > 0) {
            return back()->with(['send_fail_msg' => 'メール送信に失敗しました']);
        }

        return back()->with(['email_msg' => 'メールを送信しました']);
    }
}
