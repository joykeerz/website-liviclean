<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    private $dataPetugas;
    private $dataPengguna;
    private $dataUsers;

    public function __construct()
    {
        $getPetugasUrl = env('API_GATEWAY_URL') . 'petugas/';
        $responsePetugas = Http::timeout(10)->get($getPetugasUrl);
        $this->dataPetugas  = $responsePetugas->json();
        $this->dataPetugas['http_code'] = $responsePetugas->getStatusCode();

        $getPenggunaUrl = env('API_GATEWAY_URL') . 'pengguna/';
        $responsePengguna = Http::timeout(10)->get($getPenggunaUrl);
        $this->dataPengguna = $responsePengguna->json();
        $this->dataPengguna['http_code'] = $responsePengguna->getStatusCode();
    }

    private function loadUsers()
    {
        $token = session('token');
        $getUsersUrl = env('API_GATEWAY_URL') . 'users/get/all';
        $responseUsers = Http::timeout(10)->withHeaders(['Authorization' => $token])->get($getUsersUrl);
        $this->dataUsers = $responseUsers->json();
        $this->dataUsers['http_code'] = $responseUsers->getStatusCode();
    }

    public function index()
    {
        $url = env('API_GATEWAY_URL') . 'transaksi/';
        try {
            $response = Http::timeout(10)->get($url);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();
            $this->loadUsers();

            return view('transaksi.index', [
                'data' => $data['data'],
                'dataPetugas' => $this->dataPetugas['data'],
                'dataPengguna' => $this->dataPengguna['data'],
                'dataUsers' => $this->dataUsers['data'],
            ]);
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function create()
    {
        $this->loadUsers();
        return view('transaksi.create', [
            'dataPetugas' => $this->dataPetugas['data'],
            'dataPengguna' => $this->dataPengguna['data'],
            'dataUsers' => $this->dataUsers['data'],

        ]);
    }

    public function store(Request $request)
    {
        $url = env('API_GATEWAY_URL') . 'transaksi/';
        try {
            $response = Http::timeout(10)->post($url, $request->all());
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return redirect()->route('transaksi.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $url = env('API_GATEWAY_URL') . 'transaksi/' . $id;
        try {
            $response = Http::timeout(10)->get($url);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return view('transaksi.edit', ['data' => $data['data'], 'dataPetugas' => $this->dataPetugas['data'], 'dataPengguna' => $this->dataPengguna['data']]);
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $url = env('API_GATEWAY_URL') . 'transaksi/' . $id;
        try {
            $response = Http::timeout(10)->put($url, $request->all());
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return redirect()->route('transaksi.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $url = env('API_GATEWAY_URL') . 'transaksi/' . $id;
        try {
            $response = Http::timeout(10)->delete($url);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return redirect()->route('transaksi.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
