<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $content=$request->input('content');
        $subject=$request->input('subject');

        Mail::to('skyblue1011@icloud.com')->send(new Newsletter($content,$subject));
        return view('admin.mails.create');
    }
    public function create(){

        return view('admin.mails.create');
    }
}
