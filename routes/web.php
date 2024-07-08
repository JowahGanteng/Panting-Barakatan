<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PesananController;



Route::resource('contacts', ContactController::class);
Route::resource('customers', CustomerController::class);


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

Route::get('/', function () {
    return view('pengunjung');
});

Route::get('authenticate',[AuthenticateController::class, 'showAuthForm'])->name('login');
Route::post('check_authenticate',[AuthenticateController::class, 'checkAuthenticate']);
Route::post('/register',[LoginController::class, 'create'])->name('register');
Route::post('passwordrequest',[LoginController::class, 'showLoginForm'])->name('password.request');
Route::get('logout',[LoginController::class, 'destroy'])->name('logout');
Route::get('login', [LoginController::class, 'showLoginForm']);


Route::post('add-contact',[CustomerController::class, 'store']);

Route::get('daftar_pesanan', [PesananController::class, 'index'])->name('daftar_pesanan');
Route::post('tambah_pesanan', [PesananController::class, 'tambah_pesanan'])->name('tambah_pesanan');
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
            Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });
});

