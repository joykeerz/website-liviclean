@extends('layout.app')

@section('css')
    <style>
        .link-plain {
            color: #000;
            text-decoration: none;
            text-align: center
        }
    </style>
@endsection

@section('navbar')
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home.logout') }}">Logout</a>
    </li>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ol>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <h5 class="card-header">
                    <center>
                        <h3>Welcome {{ $data['nama'] }}!</h3>
                    </center>
                </h5>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <a class="card-link link-plain" href="{{ route('langganan.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Kelola Langganan</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a class="card-link link-plain" href="{{ route('transaksi.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Kelola Transaksi</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a class="link-plain card-link" href="{{ route('sampah.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Kelola Sampah</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-12 mt-2">
                            <a class="link-plain card-link" href="{{ route('users.index') }}">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Kelola Akun</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
