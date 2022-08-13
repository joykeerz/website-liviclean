<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanggananController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserManageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class . '@index')->name('home.landing');
Route::get('/dashboard', HomeController::class . '@dashboard')->name('home.dashboard');
Route::get('/register', HomeController::class . '@register')->name('home.register');
Route::post('/login', HomeController::class . '@login')->name('home.login');
Route::get('/logout', HomeController::class . '@logout')->name('home.logout');

Route::get('/sampah', SampahController::class . '@index')->name('sampah.index');
Route::get('/sampah/create', SampahController::class . '@create')->name('sampah.create');
Route::get('/sampah/edit/{id}', SampahController::class . '@edit')->name('sampah.edit');
Route::post('/sampah/update/{id}', SampahController::class . '@update')->name('sampah.update');
Route::get('/sampah/delete/{id}', SampahController::class . '@delete')->name('sampah.delete');
Route::post('/sampah', SampahController::class . '@store')->name('sampah.store');

Route::get('/transaksi', TransaksiController::class . '@index')->name('transaksi.index');
Route::get('/transaksi/create', TransaksiController::class . '@create')->name('transaksi.create');
Route::post('/transaksi', TransaksiController::class . '@store')->name('transaksi.store');
Route::get('/transaksi/edit/{id}', TransaksiController::class . '@edit')->name('transaksi.edit');
Route::post('/transaksi/update/{id}', TransaksiController::class . '@update')->name('transaksi.update');
Route::get('/transaksi/delete/{id}', TransaksiController::class . '@delete')->name('transaksi.delete');

Route::get('/langganan', LanggananController::class . '@index')->name('langganan.index');
Route::get('/langganan/create', LanggananController::class . '@create')->name('langganan.create');
Route::post('/langganan', LanggananController::class . '@store')->name('langganan.store');
Route::get('/langganan/edit/{id}', LanggananController::class . '@edit')->name('langganan.edit');
Route::post('/langganan/update/{id}', LanggananController::class . '@update')->name('langganan.update');
Route::get('/langganan/delete/{id}', LanggananController::class . '@delete')->name('langganan.delete');

Route::get('/users', UserManageController::class . '@index')->name('users.index');
Route::get('/users/create', UserManageController::class . '@create')->name('users.create');
Route::post('/users', UserManageController::class . '@store')->name('users.store');
Route::get('/users/edit/{id}', UserManageController::class . '@edit')->name('users.edit');
Route::post('/users/update/{id}', UserManageController::class . '@update')->name('users.update');
