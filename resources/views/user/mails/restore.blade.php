@component('mail::message')
<h1>Dear {{$user->username}}</h1>
<p>If you want to reactivate your account, You will have 30 days to restore</p>
@component('mail::button', ['url' => $url])
    Reactivate Account
@endcomponent
<p>This reactivation will expire in 30 days.</p>
<p>
    Thanks for using our app.
</p>
<p>
    Regards,<br>
    CCC news
</p>
<hr>
@component('mail::footer',['url => $url'])
<p>
    If you're having trouble clicking the "Reactivate Account" button, copy and paste the URL below into your web browser:{!! $url !!}
</p>
@endcomponent
@endcomponent
