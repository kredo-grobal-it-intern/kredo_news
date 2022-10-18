@component('mail::message')
<h1>Dear {{$user->username}}</h1>
<h2>If you want to reactivate your account, You will have a month to restore</h2>
@component('mail::button', ['url' => $url])
    Reactivate Account
@endcomponent
<p>
    Thanks for useing our app.
</p>
<p>
    Regards,<br>
    CCC news
</p>
@component('mail::footer',['url => $url'])
<p>
    If you're having trouble clicking the "Reactivate Account" button, copy and paste the URL below into your web browser:{!! $url !!}
</p>
@endcomponent
@endcomponent
