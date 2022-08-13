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
                    <h1>Edit User</h1>
                    <form action="{{ route('users.update', ['id'=>$data['id']]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input required value="{{$data['nama']}}" type="text" class="form-control" name="nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required value="{{$data['email']}}" type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input required type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="tlp">No Tlp/Hp</label>
                            <input required value="{{$data['tlp']}}" type="tlp" class="form-control" name="tlp" placeholder="+62">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="role">
                                <option selected value="{{$data['role']}}">Current : {{$data['role']}}</option>
                                <option>admin</option>
                                <option>pengguna</option>
                                <option>petugas</option>
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

@section('scripts')

@endsection
