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
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-body">
                    <h1>Kelola User</h1>
                    <div class="row">
                        <div class="col-8">
                            <a href="{{ route('users.create') }}" class="badge bg-primary">Tambah User</a>
                        </div>
                    </div>

                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tlp</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($data as $user)
                                <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{$user['nama']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['tlp']}}</td>
                                    <td>{{$user['role']}}</td>
                                    <td>
                                        <a href="{{ route('users.edit', ['id'=>$user['id']]) }}">edit</a>
                                        <a href="{{ route('transaksi.delete', ['id'=>$user['id']]) }}">delete</a>
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

@section('scripts')

@endsection
