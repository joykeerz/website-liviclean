@extends('layout.app')

@section('navbar')
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{ route('home.dashboard') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home.logout') }}">Logout</a>
    </li>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <h1>Tambah Data Transaksi</h1>
                    <form action="{{ route('transaksi.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_pengguna">Petugas</label>
                            <select class="form-control" name="id_pengguna">
                                @foreach ($dataPetugas as $petugas)
                                    @foreach ($dataUsers as $users)
                                        @if ($petugas['id_user'] == $users['id'])
                                            <option value="{{ $petugas['id'] }}">{{ $users['nama'] }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_petugas">Pengguna</label>
                            <select class="form-control" name="id_petugas">
                                @foreach ($dataPengguna as $pengguna)
                                    @foreach ($dataUsers as $users)
                                        @if ($pengguna['id_user'] == $users['id'])
                                            <option value="{{ $pengguna['id'] }}">{{ $users['nama'] }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="berat_sampah_total">Berat Sampah (gram)</label>
                            <input type="text" class="form-control" name="berat_sampah_total" placeholder="Misal. 40">
                        </div>
                        <div class="form-group">
                            <label for="biaya_transaksi">Biaya Trans.</label>
                            <input type="text" class="form-control" name="biaya_transaksi" placeholder="Misal. 50000">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('scripts')
    <script>
        // if (localStorage.getItem("token") === null) {
        //     localStorage.setItem("token", {{ $token }});
        // }
    </script>
@endsection --}}
