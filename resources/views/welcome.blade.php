@extends('layout.app')

@section('navbar')
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{route('home.dashboard')}}">Home</a>
    </li>
@endsection

@section('content')
    @if (Session::has('token'))
        You Already Logged In
    @else
        <div class="row justify-content-center">
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('error'))
                            <div class="alert alert-success alert-dismissible">
                                <h5><i class="icon fas fa-check"></i> Perhatian!</h5>
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('home.login') }}">
                            @csrf
                            <div class="mb-3">
                                <h1>Liviclean App</h1>
                                <label for="tb_email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text">
                                    Kami tidak akan pernah membagikan email Anda kepada orang
                                    lain.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tb_password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Masuk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('scripts')

@endsection
