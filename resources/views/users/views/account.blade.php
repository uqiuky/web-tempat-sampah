@extends('users.layouts.main')

@section('container')
    @include('users.layouts.sidebar');
    <section class="home-section">
        <h4 class="pt-3 mb-2">PENGATURAN PROFIL</h4>
        <hr>
        <table class="table table-borderless table-responsive">
            <thead class="align-middle">
                <tr>
                    <th scope="col" class="col-2">
                        @if ($data->photo)
                            <img src="{{ asset('storage/' . $data->photo) }}" style="width: 14rem; height: 14rem"
                                class="rounded-circle border">
                        @else
                            <img src="../img/profile-picture.png" style="width: 14rem; height: 14rem"
                                class="rounded-circle border">
                        @endif
                    </th>
                    <th scope="col" class="col-9">
                        <h1 class="display-5 ">{{ $data->name }}</h1>
                        <h3>
                            @if (value($data->is_admin) === 1)
                                (Admin)
                            @else
                                (Tukang Sampah)
                            @endif
                        </h3>
                    </th>
                    <th scope="col" class="col-1">
                        <a href="/pekerja/{{ $data->id }}/edit">
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
                        <p class="lead card-text">{{ $data->username }}</p>
                        <h5 class="card-title">Tanggal Lahir</h5>
                        <p class="lead card-text">
                            @if (!$data->birth_date)
                                -
                            @else
                                {{ $data->birth_date }}
                            @endif
                        </p>
                        <h5 class="card-title">Jenis Kelamin</h5>
                        <p class="lead card-text">
                            @if (!$data->gender)
                                -
                            @else
                                {{ $data->gender }}
                            @endif
                        </p>
                        <h5 class="card-title">Alamat</h5>
                        <p class="lead card-text">
                            @if (!$data->address)
                                -
                            @else
                                {{ $data->address }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-2 my-2">
                    <h4 class="card-header">Kontak Pengguna</h4>
                    <div class="card-body">
                        <h5 class="card-title">Nomor Telepon</h5>
                        <p class="lead card-text">
                            @if (!$data->phone)
                                -
                            @else
                                {{ $data->phone }}
                            @endif
                        </p>
                        <h5 class="card-title">Email</h5>
                        <p class="lead card-text">{{ $data->email }}</p>
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
