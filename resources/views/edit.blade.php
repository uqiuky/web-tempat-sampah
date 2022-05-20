@extends('layouts.main')

@section('container')
    @include('partials.sidebar')
    <section class="home-section">
        <h4 class="pt-3 text-center">SUNTING DATA PENGGUNA</h4>
        <hr>
        <form class="col-lg-8 justify-content-center mx-auto mb-4">
            <div class="mb-3">
                <label for="exampleInputUsername" class="form-label">Username</label>
                <input type="name" class="form-control" id="exampleInputUsername" aria-describedby="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputFullname" class="form-label">Nama Lengkap</label>
                <input type="name" class="form-control" id="exampleInputFullname" aria-describedby="fullname">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputbirthday" class="form-label">Tanggal Lahir</label>
                <input type="name" class="form-control" id="exampleInputbirthday" aria-describedby="birthday">
            </div>
            <label class="form-label">Jenis Kelamin</label>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1">
                    <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputalamat" class="form-label">Alamat</label>
                <input type="name" class="form-control" id="exampleInputalamat" aria-describedby="alamat">
            </div>
            <div class="mb-3">
                <label for="exampleInputtelepon" class="form-label">Nomor Telepon</label>
                <input type="name" class="form-control" id="exampleInputtelepon" aria-describedby="telepon">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Foto Profil</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <button type="submit" class="btn btn-primary">Sunting</button>
        </form>
    </section>
@endsection
