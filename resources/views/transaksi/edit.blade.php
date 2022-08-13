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
                    <h1>Edit Data Transaksi</h1>
                    <form action="{{ route('transaksi.update', ['id' => $data['id']]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_petugas">Petugas</label>
                            <select class="form-control" name="id_petugas">
                                <option selected value="{{ $data['id_petugas'] }}">Current : {{ $data['id_petugas'] }}
                                </option>

                                @foreach ($dataPetugas as $petugas)
                                    <option value="{{ $petugas['id'] }}">{{ $petugas['id'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pengguna">Pengguna</label>
                            <select class="form-control" name="id_pengguna">
                                <option selected value="{{ $data['id_pengguna'] }}">Current : {{ $data['id_pengguna'] }}
                                </option>

                                @foreach ($dataPengguna as $pengguna)
                                    <option value="{{ $pengguna['id'] }}">{{ $pengguna['id'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="berat_sampah_total">Berat Sampah (gram)</label>
                            <input type="text" class="form-control" name="berat_sampah_total" placeholder="Misal. 40"
                                value="{{ $data['berat_sampah_total'] }}">
                        </div>
                        <div class="form-group">
                            <label for="biaya_transaksi">Biaya Trans.</label>
                            <input type="text" class="form-control" name="biaya_transaksi" placeholder="Misal. 50000"
                                value="{{ $data['biaya_transaksi'] }}">
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
