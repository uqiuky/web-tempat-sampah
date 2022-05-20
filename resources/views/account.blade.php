@extends('layouts.main')

@section('container')
    @include('partials.sidebar');
    <section class="home-section">
        <h4 class="pt-3 mb-2">PENGATURAN PROFIL</h4>
        <hr>
        <table class="table table-borderless">
            <thead class="align-middle">
                <tr>
                    <th scope="col"><img src="img/syauqi_foto.png" style="width: 14rem; height: 14rem"
                            class="rounded-circle border" alt="..."></th>
                    <th scope="col">
                        <h1 class="display-5 ">Muhammad Syauqi Mubarak</h1>
                        <h3>(Admin)</h3>
                    </th>
                    <th scope="col">
                        <a href="/edit_bio">
                            <i class="bi bi-pencil-square display-5"></i>
                        </a>
                    </th>
                </tr>
            </thead>
        </table>
        <div class="row">
            <div class="col">
                <div class="card mx-2 my-2">
                    <h4 class="card-header">Detail Pengguna</h4>
                    <div class="card-body">
                        <h5 class="card-title">Username</h5>
                        <p class="lead card-text">Syauqi</p>
                        <h5 class="card-title">Tanggal Lahir</h5>
                        <p class="lead card-text">8 Agustus 2000</p>
                        <h5 class="card-title">Jenis Kelamin</h5>
                        <p class="lead card-text">Pria</p>
                        <h5 class="card-title">Alamat</h5>
                        <p class="lead card-text">Perumahan Mijen Permai blok B nomor 50, Semarang</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-2 my-2">
                    <h4 class="card-header">Kontak Pengguna</h4>
                    <div class="card-body">
                        <h5 class="card-title">Nomor Telepon</h5>
                        <p class="lead card-text">+6281390081208</p>
                        <h5 class="card-title">Email</h5>
                        <p class="lead card-text">syauqimubarak8@gmail.com</p>
                    </div>
                </div>
                <div class="card mx-2 my-2">
                    <h4 class="card-header">Lain-lain</h4>
                    <div class="card-body">
                        <p class="lead card-text"><a href="">Hubungi Admin</a></p>
                        <p class="lead card-text"><a href="">Tentang situs ini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
