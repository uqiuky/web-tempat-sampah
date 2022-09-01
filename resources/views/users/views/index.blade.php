@extends('users.layouts.main')

@section('container')
    @include('users.layouts.sidebar')
    <section class="home-section">
        <h4 class="pt-3">DATA PEKERJA TUKANG SAMPAH</h4>
        <h5 class="mb-2">POLITEKNIK NEGERI SEMARANG</h5>
        <hr>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table table-responsive table-hover table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lingkup Pantau</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Foto Profil</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if (value($user->is_admin) == 1)
                                Admin
                            @else
                                Tukang Sampah
                            @endif
                        </td>
                        <td>
                            @if (!$user->name)
                                -
                            @else
                                {{ $user->name }}
                            @endif
                        </td>
                        <td>
                            @if (!$user->lingkup_pantau)
                                -
                            @elseif ($user->is_admin == 1)
                                Semua Gedung
                            @else
                                {{ $user->lingkup_pantau }}
                            @endif
                        </td>
                        <td>
                            @if (!$user->birth_date)
                                -
                            @else
                                {{ $user->birth_date }}
                            @endif
                        </td>
                        <td>
                            @if (!$user->gender)
                                -
                            @else
                                {{ $user->gender }}
                            @endif
                        </td>
                        <td>
                            @if (!$user->address)
                                -
                            @else
                                {{ $user->address }}
                            @endif
                        </td>
                        <td>
                            @if (!$user->phone)
                                -
                            @else
                                {{ $user->phone }}
                            @endif
                        </td>
                        <td>
                            @if (!$user->email)
                                -
                            @else
                                {{ $user->email }}
                            @endif
                        </td>
                        <td>
                            @if ($user->photo)
                                <img height="100" width="100" src="{{ asset('storage/' . $user->photo) }}"
                                    class="rounded mx-auto d-block">
                            @else
                                <img height="100" width="100" src="img/profile-picture.png"
                                    class="rounded mx-auto d-block">
                            @endif
                        </td>
                        <td>
                            <form action="/pekerja/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger border-0 align-middle"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus akun?')"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-grid gap-2 col-3 mx-auto">
            <a class="btn btn-success mb-4" href="/pekerja/create" role="button">Tambah Pekerja</a>
        </div>
    </section>
@endsection
