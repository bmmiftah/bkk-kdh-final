@component('mail::message')
# {{ $data['title'] }}
 
{{ $data['message'] }}
 
@component('mail::button', ['url' => $data['url']])
Verifikasi Akun
@endcomponent
 
Terimakasih,<br>
{{ config('app.name') }}
@endcomponent