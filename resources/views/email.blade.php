@component('mail::message')
    # Halo, Pekerja Angkut Sampah!

    Tempat sampah sepertinya ada yang penuh! Harap segera kosongkan sampah agar bisa digunakan lagi. Untuk melihat tempat
    sampah yang penuh, silahkan klik tombol di bawah ini :

    @component('mail::button', ['url' => ''])
        Periksa Tempat Sampah
    @endcomponent
    Terimakasih,<br />
    {{ config('app.name') }}
@endcomponent

{{-- <script>
    $("#test").each(function () {
        var $this = $(this);
        var t = $this.text();
        $this.html(t.replace("&lt", "<").replace("&gt", ">"));
    });
</script> --}}
