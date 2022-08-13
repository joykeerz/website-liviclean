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
                    <h1>Kelola Langganan</h1>
                    <a href="{{ route('langganan.create') }}">Buat Langganan Baru</a>

                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pengguna</th>
                                    <th>Petugas</th>
                                    <th>Biaya Trans.</th>
                                    <th>Tgl Mulai</th>
                                    <th>Tgl Selesai</th>
                                    <th>Hari</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($data as $langganan)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>

                                        @foreach ($dataPengguna as $pengguna)
                                            @if ($langganan['id_pengguna'] == $pengguna['id'])
                                                @foreach ($dataUsers as $users)
                                                    @if ($pengguna['id_user'] == $users['id'])
                                                        <td>{{ $users['nama'] }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        @foreach ($dataPetugas as $petugas)
                                            @if ($langganan['id_petugas'] == $petugas['id'])
                                                @foreach ($dataUsers as $users)
                                                    @if ($petugas['id_user'] == $users['id'])
                                                        <td>{{ $users['nama'] }}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        <td>{{ $langganan['biaya_transaksi'] }}</td>
                                        <td>{{ $langganan['tgl_mulai'] }}</td>
                                        <td>{{ $langganan['tgl_selesai'] }}</td>
                                        <td>{{ $langganan['hari_pengambilan'] }}</td>
                                        <td>
                                            <a href="{{ route('langganan.edit', ['id' => $langganan['id']]) }}">edit</a>
                                            <a href="{{ route('langganan.delete', ['id' => $langganan['id']]) }}">delete</a>
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
