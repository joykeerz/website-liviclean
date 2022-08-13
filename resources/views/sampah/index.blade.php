@extends('layout.app')

@section('navbar')
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{route('home.dashboard')}}">Home</a>
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
                    <h1>Kelola Sampah</h1>
                    <a href="{{ route('sampah.create') }}">Tambah Data</a>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>jenis</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $sampah)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{$sampah['jenis_sampah']}}</td>
                                        <td>
                                            <a href="{{ route('sampah.edit', ['id'=>$sampah['id']]) }}">edit</a>
                                            <a href="{{ route('sampah.delete', ['id'=>$sampah['id']]) }}">delete</a>
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
