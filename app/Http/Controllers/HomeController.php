<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $url = env('API_GATEWAY_URL') . 'users/login';
        try {
            $response = Http::timeout(10)->post($url, [
                'email' => $request->email,
                'password' => $request->password
            ]);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            if($data['http_code'] != 200) {
                return redirect()->back()->with('error', 'mohon cek password dan email anda kembali');
            }

            $token = $data['data']['token'];
            $refreshToken = $data['data']['refreshToken'];
            $email = $request->email;
            session(['token' => $token, 'refreshToken' => $refreshToken, 'email' => $email]);

            return redirect()->route('home.dashboard');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Login error');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        $url = env('API_GATEWAY_URL') . 'users';
        $urlRefreshToken = env('API_GATEWAY_URL') . 'refresh-tokens';
        $token = session('token');
        $refreshToken = session('refreshToken');
        try {
            $response = Http::timeout(10)->withHeaders(['Authorization'=>$token])->get($url);
            $data = $response->json();
            // dd($data['message']);
            // if($data['message'] === "jwt expired"){
            //     $newToken = Http::timeout(10)->get($urlRefreshToken, [
            //         'refresh_token' => $refreshToken,
            //         'email' => session('email')
            //     ]);
            // }

            $data = $data['data'];
            $data['http_code'] = $response->getStatusCode();

            if($data['http_code'] != 200) {
                return redirect()->back()->with('error', 'mohon cek password dan email anda kembali');
            }

            return view('dashboard', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Login error');
        }

    }

    public function logout()
    {
        $url = env('API_GATEWAY_URL') . 'users/logout';
        $token = session('token');

        try {
            $response = Http::timeout(10)->withHeaders(['Authorization'=>$token])->post($url);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            if($data['http_code'] != 200) {
                return redirect()->back()->with('error', 'logout gagal');
            }

            session()->forget('token');
            session()->forget('refreshToken');
            return redirect()->route('home.landing');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Login error');
        }

    }
}
