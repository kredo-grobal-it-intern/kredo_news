<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class RestoreMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url=URL::temporarySignedRoute('reactivate',now()->addMonth(1),['user_id' => $this->user->id]);
        return $this->subject('Your account has been deleted')
        ->markdown('user.mails.restore',['url'=>$url])->with(['user'=>$this->user,'url'=>$url]);
    }
}
