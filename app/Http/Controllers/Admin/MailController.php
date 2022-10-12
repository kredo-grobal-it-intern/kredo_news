<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $users = User::where('is_admin', '0')->whereNotNull('email_verified_at')->get();
        $content = $request->input('content');
        $subject = $request->input('subject');

        Mail::bcc($users)->send(new Newsletter($content, $subject));
        return view('admin.mails.create');
    }
    public function create()
    {

        return view('admin.mails.create');
    }
}
