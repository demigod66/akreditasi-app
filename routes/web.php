<?php

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
    return view('template');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/document', 'DocumentController@index');

Route::group(['middleware' => ['role:PIC_1|super-admin']], function () {
    Route::get('/admin/standar_isi', 'StandarIsiController@index');
    Route::get('/admin/standar_isi/create', 'StandarIsiController@create');
    Route::post('/admin/standar_isi/store', 'StandarIsiController@store');
    Route::get('/admin/standar_isi/edit/{id}', 'StandarIsiController@edit');
    Route::post('/admin/standar_isi/update/{id}', 'StandarIsiController@update');
    Route::get('/admin/standar_isi/view/{id}', 'StandarIsiController@view');
    Route::get('/show-standar-isi-pdf/{id}', function ($id) {
        $file_standar_isi = StandarIsi::findorfail($id);
        return response()->file(public_path($file_standar_isi->file));
    })->name('standar-isi.show-pdf');
});
// standar proses

Route::get('/admin/standar_proses', 'StandarProsesController@index');
Route::get('/admin/standar_proses/edit/{id}', 'StandarProsesController@edit');
Route::post('/admin/standar_proses/update/{id}', 'StandarProsesController@update');
Route::get('/admin/standar_proses/view', 'StandarProsesController@view');
Route::get('/show-standar-proses-pdf/{id}', function ($id) {
    $file_standar_proses = StandarProses::find($id);
    return response()->file(public_path('uploads/standar_isi/' . $file_standar_proses->file));
})->name('standar-proses.show-pdf');


// standar penilaian
Route::get('/admin/standar_penilaian', 'StandarPenilaianController@index');
Route::get('/admin/standar_penilaian/edit/{id}', 'StandarPenilaianController@edit');
Route::post('/admin/standar_penilaian/update/{id}', 'StandarPenilaianController@update');
Route::get('/admin/standar_penilaian/view', 'StandarPenilaianController@view');
Route::get('/show-standar-penilaian-pdf/{id}', function ($id) {
    $file_standar_penilaian = StandarPenilaian::find($id);
    return response()->file(public_path('uploads/standar_penilaian/' . $file_standar_penilaian->file));
})->name('standar-penilaian.show-pdf');



// standar sarana dan prasarana
Route::get('/admin/standar_sarana', 'StandarSaranaController@index');
Route::get('/admin/standar_sarana/edit/{id}', 'StandarSaranaController@edit');
Route::post('/admin/standar_sarana/update/{id}', 'StandarSaranaController@update');
Route::get('/admin/standar_sarana/view', 'StandarSaranaController@view');
Route::get('/show-standar-sarana-pdf/{id}', function ($id) {
    $file_standar_sarana = StandarSarana::find($id);
    return response()->file(public_path('uploads/standar_sarana/' . $file_standar_sarana->file));
})->name('standar-sarana.show-pdf');


// standar biaya
Route::get('/admin/standar_biaya', 'StandarBiayaController@index');
Route::get('/admin/standar_biaya/edit/{id}', 'StandarBiayaController@edit');
Route::post('/admin/standar_biaya/update/{id}', 'StandarBiayaController@update');
Route::get('/admin/standar_biaya/view', 'StandarBiayaController@view');
Route::get('/show-standar-biaya-pdf/{id}', function ($id) {
    $file_standar_biaya = StandarBiaya::find($id);
    return response()->file(public_path('uploads/standar_biaya/' . $file_standar_biaya->file));
})->name('standar-biaya.show-pdf');

// standar pengelolaan
Route::get('/admin/standar_pengelolaan', 'StandarPengelolaanController@index');
Route::get('/admin/standar_pengelolaan/edit/{id}', 'StandarPengelolaanController@edit');
Route::post('/admin/standar_pengelolaan/update/{id}', 'StandarPengelolaanController@update');
Route::get('/admin/standar_pengelolaan/view', 'StandarPengelolaanController@view');
Route::get('/show-standar-pengelolaan-pdf/{id}', function ($id) {
    $file_standar_pengelolaan = StandarPengelolaan::find($id);
    return response()->file(public_path('uploads/standar_pengelolaan/' . $file_standar_pengelolaan->file));
})->name('standar-pengelolaan.show-pdf');


// standar kompetensi lulus
Route::get('/admin/standar_lulusan', 'StandarLulusanController@index');
Route::get('/admin/standar_lulusan/edit/{id}', 'StandarLulusanController@edit');
Route::post('/admin/standar_lulusan/update/{id}', 'StandarLulusanController@update');
Route::get('/admin/standar_lulusan/view', 'StandarLulusanController@view');
Route::get('/show-standar-pengelolaan-pdf/{id}', function ($id) {
    $file_standar_lulusan = StandarLulusan::find($id);
    return response()->file(public_path('uploads/standar_lulusan/' . $file_standar_lulusan->file));
})->name('standar-lulusan.show-pdf');

// standar pendidik

Route::get('/admin/standar_pendidik', 'StandarPendidikController@index');
Route::get('/admin/standar_pendidik/edit/{id}', 'StandarPendidikController@edit');
Route::post('/admin/standar_pendidik/update/{id}', 'StandarPendidikController@update');
Route::get('/admin/standar_pendidik/view', 'StandarPendidikController@view');
Route::get('/show-standar-pendidik-pdf/{id}', function ($id) {
    $file_standar_pendidik = StandarPendidik::find($id);
    return response()->file(public_path('uploads/standar_pendidik/' . $file_standar_pendidik->file));
})->name('standar-pendidik.show-pdf');
