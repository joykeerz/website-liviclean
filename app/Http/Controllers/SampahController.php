<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SampahController extends Controller
{
    public function index()
    {
        $url = env('API_GATEWAY_URL') . 'sampah/';
        try {
            $response = Http::timeout(10)->get($url);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return view('sampah.index', ['data' => $data['data']]);
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('sampah.create');
    }

    public function store(Request $request)
    {
        $url = env('API_GATEWAY_URL') . 'sampah/';
        try {
            $response = Http::timeout(10)->post($url, $request->all());
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return redirect()->route('sampah.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $url = env('API_GATEWAY_URL') . 'sampah/' . $id;
        try {
            $response = Http::timeout(10)->get($url);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return view('sampah.edit', ['data' => $data['data']]);
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $url = env('API_GATEWAY_URL') . 'sampah/' . $id;
        try {
            $response = Http::timeout(10)->put($url, $request->all());
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return redirect()->route('sampah.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $url = env('API_GATEWAY_URL') . 'sampah/' . $id;
        try {
            $response = Http::timeout(10)->delete($url);
            $data = $response->json();
            $data['http_code'] = $response->getStatusCode();

            return redirect()->route('sampah.index');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
