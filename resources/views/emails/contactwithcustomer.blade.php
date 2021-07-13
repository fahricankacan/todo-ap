@component('mail::message')
# Introduction

The body of your message.

@component('mail::textarea', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
