<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\PasswordController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\BarangController;


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
    return view('welcome');
    
});

// Route::middleware('auth:admin')->group(function(){
//     // Tulis routemu di sini.
//   });
//  Route::post('/login', 'App\Http\Controllers\LoginController@postLogin')->name('proseslogin');
  //Route::post('/login', 'App\Http\Controllers\Auth\AdminAuthController@postLogin')->name('proseslogin');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('/user1',[UserController::Class,'index'])->name('user1');

Route::get('/admin1','App\Http\Controllers\AdminController@index')->name('admin');

Route::resource('admins', AdminController::class);


// Route::resource()
// Route::get('/edit-password/{user}', [PasswordController::class, 'edit'])->name('edit.password');
// Route::patch('/edit-password/{user}', [PasswordController::class, 'update'])->name('update.password');

Route::resource('kendaraan', KendaraanController::class);
Route::resource('kendaraan', 'App\Http\Controllers\KendaraanController');


Route::resource('user', UserController::class);
Route::resource('pegawai', 'App\Http\Controllers\PegawaiController');
Route::get('/pegawai/kendaraan/{id}','App\Http\Controllers\PegawaiController@kendaraan')->name('pegawai.kendaraan');
Route::get('/pegawai/kendaraan-tambah/{id}','App\Http\Controllers\PegawaiController@kendaraanTambah')->name('pegawai.kendaraan.tambah');
Route::post('/pegawai/kendaraan-simpan/{id}','App\Http\Controllers\PegawaiController@kendaraanSimpan')->name('pegawai.kendaraan.simpan');
Route::DELETE('/pegawai/kendaraan-hapus/{id}','App\Http\Controllers\PegawaiController@kendaraanHapus')->name('pegawai.kendaraan.hapus');
//Route::get('/pegawai/kendaraan-servis/{id}','App\Http\Controllers\PegawaiController@kendaraanServis')->name('pegawai.kendaraan.servis');

Route::get('/pegawai/kendaraan-servis/{id}','App\Http\Controllers\PegawaiController@kendaraanServis')->name('pegawai.kendaraan.servis');
Route::get('/pegawai/kendaraan-servis-tambah/{id}','App\Http\Controllers\PegawaiController@servisTambah')->name('pegawai.kendaraan.servis.tambah');
Route::post('/pegawai/kendaraan-servis-simpan/{id}','App\Http\Controllers\PegawaiController@servisSimpan')->name('pegawai.kendaraan.servis.simpan');

//barang
Route::resource('barang',BarangController::class);
Route::resource('barang', 'App\Http\Controllers\BarangController');