@extends('layouts.main')

@section('container')
    @include('partials.sidebar')
    <section class="home-section">
        <h4 class="pt-3 text-center">SUNTING DATA PENGGUNA</h4>
        <hr>
        <form class="col-lg-8 justify-content-center mx-auto mb-4" method="post" action="/pekerja/{{ $data->id }}"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                    name="username" required autofocus value="{{ old('username', $data->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required value="{{ old('name', $data->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date"
                    name="birth_date" required value="{{ old('name', $data->birth_date) }}">
                @error('birth_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <label class="form-label">Jenis Kelamin</label>
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_1" value="Laki-laki" required
                        @if ($data->gender == 'Laki-laki') checked @endif>
                    <label class="form-check-label" for="gender_1">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender_2" value="Perempuan"
                        @if ($data->gender == 'Perempuan') checked @endif>
                    <label class="form-check-label" for="gender_2">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" required
                    name="address" value="{{ old('address', $data->address) }}">
                @error('birth_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    id="phone" required value="{{ old('phone', $data->phone) }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" required value="{{ old('email', $data->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Profil</label>
                <input type="hidden" name="oldImage" value="{{ $data->photo }}">
                @if ($data->photo)
                    <img src="{{ asset('storage/' . $data->photo) }}"
                        class="img-preview img-fluid mb-3 col-sm-4 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                    name="photo" onchange="previewImage()">
                @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Sunting</button>
        </form>
    </section>
@endsection
