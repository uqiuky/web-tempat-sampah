@extends('layouts.main')

@section('container')
    @include('partials.sidebar')
    <section class="home-section">
        <h4 class="pt-3 text-center">TAMBAH DATA PEKERJA TUKANG SAMPAH</h4>
        <hr>
        <form method="post" action="/pekerja" class="col-lg-8 justify-content-center mx-auto">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                    aria-describedby="username" required name="username" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    aria-describedby="email" required required name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Jenis Pengguna</label>
                <select class="form-select" aria-label="Default select example" name="is_admin">
                    <option value="0">Tukang Sampah</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan Akun</button>
        </form>
    </section>
@endsection
