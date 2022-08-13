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
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-body">
                    <h1>Kelola Transaksi</h1>
                    <a href="{{ route('transaksi.create') }}">Tambah Data</a>

                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pengguna</th>
                                    <th>Petugas</th>
                                    <th>Berat (gram)</th>
                                    <th>Biaya Trans.</th>
                                    <th>Tgl Trans.</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($data as $transaksi)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>

                                        @foreach ($dataPengguna as $pengguna)
                                            @if ($transaksi['id_pengguna'] == $pengguna['id'])
                                                @foreach ($dataUsers as $users)
                                                    @if ($pengguna['id_user'] == $users['id'])
                                                        <td>{{ $users['nama'] }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        @foreach ($dataPetugas as $petugas)
                                            @if ($transaksi['id_petugas'] == $petugas['id'])
                                                @foreach ($dataUsers as $users)
                                                    @if ($petugas['id_user'] == $users['id'])
                                                        <td>{{ $users['nama'] }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        <td>{{ $transaksi['berat_sampah_total'] }}</td>
                                        <td>{{ $transaksi['biaya_transaksi'] }}</td>
                                        <td>{{ $transaksi['created_at'] }}</td>
                                        <td>
                                            <a href="{{ route('transaksi.edit', ['id' => $transaksi['id']]) }}">edit</a>
                                            <a href="{{ route('transaksi.delete', ['id' => $transaksi['id']]) }}">delete</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
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
