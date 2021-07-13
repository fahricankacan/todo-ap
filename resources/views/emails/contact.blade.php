@component('mail::message')
# Todo App 

Todo app deneme maili

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Button Text
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
