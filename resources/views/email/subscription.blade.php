@component('mail::message')
# Berlangganan Di Website KawanPeduli

Terimakasih Telah Berlangganan,Tetap Nantikan Informasi-Informasi Dari Kami!

@component('mail::button', ['url' => 'localhost'])
Kembali Ke Website
@endcomponent

Salam Kami,<br>
{{ config('app.name') }}
@endcomponent
