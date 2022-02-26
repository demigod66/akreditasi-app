<?php

use App\Http\Controllers\UserController;
use App\Models\StandarBiaya;
use App\Models\StandarIsi;
use App\Models\StandarLulusan;
use App\Models\StandarPendidik;
use App\Models\StandarPengelolaan;
use App\Models\StandarPenilaian;
use App\Models\StandarProses;
use App\Models\StandarSarana;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['permission:lihat content standar isi dan standar proses']], function () {

    // standar isi
    Route::get('/admin/standar_isi', 'StandarIsiController@index');
    Route::get('/admin/standar_isi/view/{id}', 'StandarIsiController@view');
    Route::get('/show-standar-isi-pdf/{id}', function ($id) {
        $file_standar_isi = StandarIsi::findorfail($id);
        return response()->file(public_path($file_standar_isi->file));
    })->name('standar-isi.show-pdf');


    // standar proses
    Route::get('/admin/standar_proses', 'StandarProsesController@index');
    Route::get('/admin/standar_proses/view/{id}', 'StandarProsesController@view');
    Route::get('/show-standar-proses-pdf/{id}', function ($id) {
        $file_standar_proses = StandarProses::find($id);
        return response()->file(public_path($file_standar_proses->file));
    })->name('standar-proses.show-pdf');


    Route::get('/admin/standar_penilaian', 'StandarPenilaianController@index');
});

Route::group(['middleware' => ['permission:lihat content standar penilaian dan standar sarana']], function () {
    Route::get('/admin/standar_penilaian/', 'StandarPenilaianController@index');
    Route::get('/admin/standar_penilaian/view/{id}', 'StandarPenilaianController@view');
    Route::get('/show-standar-penilaian-pdf/{id}', function ($id) {
        $file_standar_penilaian = StandarPenilaian::find($id);
        return response()->file(public_path('uploads/standar_penilaian/' . $file_standar_penilaian->file));
    })->name('standar-penilaian.show-pdf');

    Route::get('/admin/standar_sarana', 'StandarSaranaController@index');
    Route::get('/admin/standar_sarana/view/{id}', 'StandarSaranaController@view');
    Route::get('/show-standar-sarana-pdf/{id}', function ($id) {
        $file_standar_sarana = StandarSarana::find($id);
        return response()->file(public_path('uploads/standar_sarana/' . $file_standar_sarana->file));
    })->name('standar-sarana.show-pdf');
});


Route::group(['middleware' => ['permission:lihat content standar penilaian dan standar sarana']], function () {
    Route::get('/admin/standar_biaya/', 'StandarBiayaController@index');
    Route::get('/admin/standar_biaya/view/{id}', 'StandarBiayaController@view');
    Route::get('/show-standar-biaya-pdf/{id}', function ($id) {
        $file_standar_biaya = StandarBiaya::find($id);
        return response()->file(public_path('uploads/standar_biaya/' . $file_standar_biaya->file));
    })->name('standar-biaya.show-pdf');

    Route::get('/admin/standar_pengelolaan', 'StandarPengelolaanController@index');
    Route::get('/admin/standar_pengelolaan/view/{id}', 'StandarPengelolaanController@view');
    Route::get('/show-standar-pengelolaan-pdf/{id}', function ($id) {
        $file_standar_pengelolaan = StandarPengelolaan::find($id);
        return response()->file(public_path($file_standar_pengelolaan->file));
    })->name('standar-pengelolaan.show-pdf');
});


Route::group(['middleware' => ['permission:lihat content standar lulusan dan standar pendidik']], function () {
    Route::get('/admin/standar_lulusan', 'StandarLulusanController@index');
    Route::get('/admin/standar_lulusan/view/{id}', 'StandarLulusanController@view');
    Route::get('/show-standar-pengelolaan-pdf/{id}', function ($id) {
        $file_standar_lulusan = StandarLulusan::find($id);
        return response()->file(public_path('uploads/standar_lulusan/' . $file_standar_lulusan->file));
    })->name('standar-lulusan.show-pdf');

    Route::get('/admin/standar_pendidik', 'StandarPendidikController@index');
    Route::get('/admin/standar_pendidik/view/{id}', 'StandarPendidikController@view');
    Route::get('/show-standar-pendidik-pdf/{id}', function ($id) {
        $file_standar_pendidik = StandarPendidik::find($id);
        return response()->file(public_path('uploads/standar_pendidik/' . $file_standar_pendidik->file));
    })->name('standar-pendidik.show-pdf');
});


// PIC 1
Route::group(['middleware' => ['role:PIC_1|super-admin']], function () {
    // Standar Isi
    Route::get('/admin/standar_isi/create', 'StandarIsiController@create');
    Route::post('/admin/standar_isi/store', 'StandarIsiController@store');
    Route::get('/admin/standar_isi/edit/{id}', 'StandarIsiController@edit');
    Route::post('/admin/standar_isi/update/{id}', 'StandarIsiController@update');
    Route::get('/admin/standar_isi/destroy/{id}', 'StandarIsiController@destroy');

    // Standar Proses
    Route::get('/admin/standar_proses/create', 'StandarProsesController@create');
    Route::post('/admin/standar_proses/store', 'StandarProsesController@store');
    Route::get('/admin/standar_proses/edit/{id}', 'StandarProsesController@edit');
    Route::post('/admin/standar_proses/update/{id}', 'StandarProsesController@update');
    Route::get('/admin/standar_proses/destroy/{id}', 'StandarProsesController@destroy');
});



// PIC 2
Route::group(['middleware' => ['role:PIC_2|super-admin']], function () {
    // standar penilaian

    Route::get('admin/standar_penilaian/create', 'StandarPenilaianController@create');
    Route::post('admin/standar_penilaian/store', 'StandarPenilaianController@store');
    Route::get('/admin/standar_penilaian/edit/{id}', 'StandarPenilaianController@edit');
    Route::post('/admin/standar_penilaian/update/{id}', 'StandarPenilaianController@update');
    Route::get('/admin/standar_penilaian/destroy/{id}', 'StandarPenilaianController@destroy');

    // standar sarana dan prasarana
    Route::get('/admin/standar_sarana/create', 'StandarSaranaController@create');
    Route::post('/admin/standar_sarana/store', 'StandarSaranaController@store');
    Route::get('/admin/standar_sarana/edit/{id}', 'StandarSaranaController@edit');
    Route::post('/admin/standar_sarana/update/{id}', 'StandarSaranaController@update');
    Route::get('/admin/standar_sarana/destroy/{id}', 'StandarSaranaController@destroy');
});



Route::group(['middleware' => ['role:PIC_3|super-admin']], function () {

    // Standar Pembiayaan
    Route::get('admin/standar_biaya/create', 'StandarBiayaController@create');
    Route::post('admin/standar_biaya/store', 'StandarBiayaController@store');
    Route::get('/admin/standar_biaya/edit/{id}', 'StandarBiayaController@edit');
    Route::post('/admin/standar_biaya/update/{id}', 'StandarBiayaController@update');
    Route::get('admin/standar_biaya/destroy/{id}', 'StandarBiayaController@destroy');

    // standar pengelolaan
    Route::get('admin/standar_pengelolaan/create', 'StandarPengelolaanController@create');
    Route::post('admin/standar_pengelolaan/store', 'StandarPengelolaanController@store');
    Route::get('/admin/standar_pengelolaan/edit/{id}', 'StandarPengelolaanController@edit');
    Route::post('/admin/standar_pengelolaan/update/{id}', 'StandarPengelolaanController@update');
    Route::get('/admin/standar_pengelolaan/destroy/{id}', 'StandarPengelolaanController@destroy');
});



Route::group(['middleware' => ['role:PIC_4|super-admin']], function () {

    // standar kompetensi lulus
    Route::get('/admin/standar_lulusan/create', 'StandarLulusanController@create');
    Route::post('/admin/standar_lulusan/store', 'StandarLulusanController@store');
    Route::get('/admin/standar_lulusan/edit/{id}', 'StandarLulusanController@edit');
    Route::post('/admin/standar_lulusan/update/{id}', 'StandarLulusanController@update');
    Route::get('/admin/standar_lulusan/destroy/{id}', 'StandarLulusanController@destroy');

    // standar pendidik

    Route::get('/admin/standar_pendidik/create', 'StandarPendidikController@create');
    Route::post('/admin/standar_pendidik/store', 'StandarPendidikController@store');
    Route::get('/admin/standar_pendidik/edit/{id}', 'StandarPendidikController@edit');
    Route::post('/admin/standar_pendidik/update/{id}', 'StandarPendidikController@update');
    Route::get('/admin/standar_pendidik/destroy/{id}', 'StandarPendidikController@destroy');
});



// SUPER ADMIN
Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('/admin/jenis_standar', 'JenisStandarController@index');
    Route::get('/admin/jenis_standar/create', 'JenisStandarController@create');
    Route::post('/admin/jenis_standar/store', 'JenisStandarController@store');
    Route::get('/admin/jenis_standar/edit/{id}', 'JenisStandarController@edit');
    Route::post('/admin/jenis_standar/update/{id}', 'JenisStandarController@update');
    Route::get('/admin/jenis_standar/destroy/{id}', 'JenisStandarController@destroy');
});


// All User
Route::group(['middleware' => 'auth'], function () {
    // user
    Route::get('/user/password', 'UserController@password');
    Route::post('/user/ubah-password', 'UserController@ubah_password');
    Route::get('/user', 'UserController@index');
    Route::get('/user/profil', 'UserController@profil');
    Route::post('/user/ubah-profil/{id}', 'UserController@ubah_profil');
});
