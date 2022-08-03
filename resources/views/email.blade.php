@component('mail::message')
# Halo, Pekerja Angkut Sampah!

Tempat sampah sepertinya ada yang penuh! Harap segera kosongkan sampah agar bisa digunakan lagi. Untuk melihat tempat sampah yang penuh, silahkan klik tombol di bawah ini :

@component('mail::button', ['url' => ''])
Periksa Tempat Sampah
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
