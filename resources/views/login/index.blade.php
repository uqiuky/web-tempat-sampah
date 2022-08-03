@extends('layouts.main')

<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column">
            <h1 class="display-1 judul">Tempat Sampah Pintar</h1>
            <p>Selamat datang di website Sampah Kita. Website untuk membantu para pekerja tukang sampah menangani sampah
                di lingkungan sekitar. Silahkan klik "Masuk" apabila anda merupakan petugas kebersihan.</p>
            <form action="/" method="post">
                @csrf
                <div class="input-group flex-nowrap">
                    <input type="text" name="username" class="form-control" placeholder="Username"
                        aria-label="Username" aria-describedby="addon-wrapping" autofocus required>
                </div>
                <div class="input-group mt-3 mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password"
                        aria-label="Password" aria-describedby="addon-wrapping" required>
                </div>
                {{-- <div class="fw-lighter">
                    <a href="">lupa username/password anda?</a>
                </div> --}}
                <button class="mt-3 btn btn-secondary btn-lg">Masuk</button>
            </form>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img pt-3">
            <img src="img/tukangsampah.png" class="img-fluid" alt="">
        </div>
    </div>
