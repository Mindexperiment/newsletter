@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@isset($unsubscribeLink)
if you would like to unsubscribe from receiving further emails you can use the URL:
[{{ $unsubscribeLink }}]({{ $unsubscribeLink }})
@endisset
@endcomponent
