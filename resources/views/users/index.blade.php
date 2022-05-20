@extends('layouts.main')

@section('container')
    @include('partials.sidebar')
    <section class="home-section">
        <h4 class="pt-3">DATA PEKERJA TUKANG SAMPAH</h4>
        <h5 class="mb-2">POLITEKNIK NEGERI SEMARANG</h5>
        <hr>
        <table class="table table-responsive table-hover table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Email</th>
                    <th scope="col">Foto Profil</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>Mark</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->is_admin }}</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td><img src="https://random.imagecdn.app/100/100" class="rounded mx-auto d-block" alt="..."></td>
                        <td><a href="">Cek Jadwal</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-grid gap-2 col-3 mx-auto">
            <a class="btn btn-success mb-4" href="/pekerja/create" role="button">Tambah Pekerja</a>
        </div>
    </section>
@endsection
