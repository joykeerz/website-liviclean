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
                    <h1>Edit Data Sampah</h1>
                    <form action="{{ route('sampah.update', ['id'=>$data['id']]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="jenis_sampah">Jenis Sampah</label>
                            <input type="text" class="form-control" name="jenis_sampah" placeholder="Jenis Sampah" value="{{$data['jenis_sampah']}}">
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
