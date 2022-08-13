<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserManageController extends Controller
{
    private $dataUsers;

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
        $this->loadUsers();
        return view('user.index', [
            'data' => $this->dataUsers['data'],
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $url = env('API_GATEWAY_URL') . 'users/register';
        $urlSaldo = env('API_GATEWAY_URL') . 'saldo/';
        $urlPetugas = env('API_GATEWAY_URL') . 'petugas/';
        $urlPengguna = env('API_GATEWAY_URL') . 'pengguna/';
        try {
            $createSaldo = Http::timeout(10)->post($urlSaldo, [
                'saldo' => 0,
            ]);
            $dataSaldo = $createSaldo->json();
            $dataSaldo['http_code'] = $createSaldo->getStatusCode();

            $response = Http::timeout(10)->post($url, [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'tlp' => $request->tlp,
                'role' => $request->role,
                'id_saldo' => $dataSaldo['data']['id'],
            ]);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            if($request->role == 'pengguna'){

                $createPengguna = Http::timeout(10)->post($urlPengguna,[
                    'id_user' => $data['data']['id'],
                ]);
                $dataPengguna = $createPengguna->json();
                $dataPengguna['http_code'] = $createPengguna->getStatusCode();

            }elseif ($request->role == 'petugas') {

                $CreatePetugas = Http::timeout(10)->post($urlPetugas,[
                    'id_user' => $data['data']['id'],
                ]);
                $dataPetugas = $CreatePetugas->json();
                $dataPetugas['http_code'] = $CreatePetugas->getStatusCode();

            }else{
                dd('role is not available');
            }
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $url = env('API_GATEWAY_URL') . 'users/' . $id;
        $token = session('token');
        try {
            $response = Http::timeout(10)->withHeaders(['Authorization' => $token])->get($url);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return view('user.edit', ['data' => $data['data']]);
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $url = env('API_GATEWAY_URL') . 'users/' . $id;
        $token = session('token');
        try {
            $response = Http::timeout(10)->withHeaders(['Authorization' => $token])->put($url, $request->all());
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
