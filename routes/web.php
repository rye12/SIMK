<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\AdminController;
//use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BBMController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\ItemController;

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
  return view('auth.login');
});

// Route::middleware('auth:admin')->group(function(){
//     // Tulis routemu di sini.
//   });
//  Route::post('/login', 'App\Http\Controllers\LoginController@postLogin')->name('proseslogin');
//Route::post('/login', 'App\Http\Controllers\Auth\AdminAuthController@postLogin')->name('proseslogin');


//Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
  return view('dashboard');
})->name('dashboard');


// Route::get('/user1',[UserController::Class,'index'])->name('user1');

// Route::get('/admin1', 'App\Http\Controllers\AdminController@index')->name('admin');

// Route::resource('admins', AdminController::class);

Route::resource('user', UsersController::class);
Route::DELETE('/user/{id}', 'App\Http\Controllers\UsersController@destroy');



// Route::resource()
// Route::get('/edit-password/{user}', [PasswordController::class, 'edit'])->name('edit.password');
// Route::patch('/edit-password/{user}', [PasswordController::class, 'update'])->name('update.password');

Route::resource('kendaraan', KendaraanController::class);
Route::get('kendaraan/lihat/{id}', 'App\Http\Controllers\KendaraanController@lihat')->name('kendaraan.foto');
Route::post('kendaraan/fotoupload/{id}', 'App\Http\Controllers\KendaraanController@fotoupload')->name('kendaraan.foto.upload');
Route::DELETE('/kendaraan/{id}', 'App\Http\Controllers\KendaraanController@destroy');

//Route::resource('user', UserController::class);
Route::resource('pegawai', PegawaiController::class);
Route::DELETE('/pegawai/{id}', 'App\Http\Controllers\PegawaiController@destroy');

//Route::resource('pegawai', 'App\Http\Controllers\PegawaiController');
Route::get('/pegawai/kendaraan/{id}', 'App\Http\Controllers\PegawaiController@kendaraan')->name('pegawai.kendaraan');
Route::get('/pegawai/kendaraan-tambah/{id}', 'App\Http\Controllers\PegawaiController@kendaraanTambah')->name('pegawai.kendaraan.tambah');
Route::post('/pegawai/kendaraan-simpan/{id}', 'App\Http\Controllers\PegawaiController@kendaraanSimpan')->name('pegawai.kendaraan.simpan');
Route::DELETE('/pegawai/kendaraan-hapus/{id}', 'App\Http\Controllers\PegawaiController@kendaraanHapus')->name('pegawai.kendaraan.hapus');
Route::get('/pegawai/kendaraan-servis/{id}', 'App\Http\Controllers\PegawaiController@kendaraanServis')->name('pegawai.kendaraan.servis');
Route::post('/pegawai/kendaraan-status/{id}', 'App\Http\Controllers\PegawaiController@kendaraanStatus')->name('pegawai.kendaraan.status');

// Route::get('/pegawai/kendaraan-servis/{id}', 'App\Http\Controllers\PegawaiController@kendaraanServis')->name('pegawai.kendaraan.servis');
// Route::get('/pegawai/kendaraan-servis-tambah/{id}', 'App\Http\Controllers\PegawaiController@servisTambah')->name('pegawai.kendaraan.servis.tambah');
// Route::post('/pegawai/kendaraan-servis-simpan/{id}', 'App\Http\Controllers\PegawaiController@servisSimpan')->name('pegawai.kendaraan.servis.simpan');

//barang
Route::resource('barang', BarangController::class);
Route::resource('barang', 'App\Http\Controllers\BarangController');
Route::resource('barang_kategori', 'App\Http\Controllers\BarangController');
Route::get('barang_kategori', 'App\Http\Controllers\BarangController@create');
Route::DELETE('/kendaraan/{id}', 'App\Http\Controllers\KendaraanController@destroy');


//servis
Route::resource('servis', ServisController::class);
Route::resource('servis', 'App\Http\Controllers\ServisController');
Route::get('servis/lihat/{id}', 'App\Http\Controllers\ServisController@lihat')->name('servis.foto');
Route::post('servis/fotoupload/{id}', 'App\Http\Controllers\ServisController@fotoupload')->name('servis.foto.upload');
Route::DELETE('/servis/{id}', 'App\Http\Controllers\ServisController@destroy');

//pajak
Route::resource('pajak', PajakController::class);
Route::resource('pajak', 'App\Http\Controllers\PajakController');
Route::DELETE('/pajak/{id}', 'App\Http\Controllers\PajakController@destroy');
Route::get('pajak/lihat/{id}', 'App\Http\Controllers\PajakController@lihat')->name('pajak.foto');
Route::post('pajak/fotoupload/{id}', 'App\Http\Controllers\PajakController@fotoupload')->name('pajak.foto.upload');

//bbm
Route::resource('bbm', BBMController::class);
Route::resource('bbm', 'App\Http\Controllers\BBMController');
Route::get('bbm/lihat/{id}', 'App\Http\Controllers\BBMController@lihat')->name('bbm.foto');
Route::post('bbm/fotoupload/{id}', 'App\Http\Controllers\BBMController@fotoupload')->name('bbm.foto.upload');
Route::DELETE('/bbm/{id}', 'App\Http\Controllers\BBMController@destroy');

//pengajuan barang
Route::resource('item', ItemController::class);
Route::DELETE('/item/{id}', 'App\Http\Controllers\ItemController@destroy');
