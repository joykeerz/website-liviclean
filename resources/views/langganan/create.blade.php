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
                    <h1>Buat Langganan Baru</h1>
                    <form action="{{ route('langganan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_pengguna">Petugas</label>
                            <select class="form-control" name="id_petugas">
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
                            <select class="form-control" name="id_pengguna">
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
                            <label for="biaya_transaksi">Biaya Trans.</label>
                            <input type="text" class="form-control" name="biaya_transaksi" placeholder="Misal. 4000">
                        </div>
                        <div class="form-group">
                            <label for="tgl_mulai">Tgl Mulai</label>
                            <input type="date" class="form-control" name="tgl_mulai" placeholder="Misal. 50000">
                        </div>
                        <div class="form-group">
                            <label for="tgl_selesai">Tgl Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" placeholder="Misal. 50000">
                        </div>
                        <div class="form-group">
                            <label for="hari_pengambilan">Hari Pengambilan</label>
                            <select class="form-control" name="hari_pengambilan">
                                <option>senin</option>
                                <option>selasa</option>
                                <option>rabu</option>
                                <option>kamis</option>
                                <option>jumaat</option>
                                <option>sabtu</option>
                                <option>minggu</option>
                            </select>
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
