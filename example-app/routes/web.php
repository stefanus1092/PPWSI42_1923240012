<?php

use App\Http\Controllers\MahasiswaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dosen', function () {
    return view('dosen');
});

Route::get('/dosen/index', function (){
    return view('dosen.index');
});

Route::get('/fakultas', function () {
    // return view('fakultas.index', ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);  
    // return view ('fakultas.index', ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]]);
    // return view ('fakultas.index')->with("fakultas", ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);
    
    $kampus = "Universitas Multi Data Palembang";
    // $fakultas = [];
    $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});

Route::get('/halo', function () {
    // return "Halo Semua";
    return "<a href='" . route('call') . "'>" . route('call') . "</a>";
});

Route::get('/kampus', function () {
    echo "<h2>Halo semua</h2>";
    echo "Kami kuliah di Kampus MDP";
});

Route::get('/kampus', function () {
    echo "<h2>Halo semua</h2>";
    echo "Kami kuliah di Kampus MDP";
});

//Route::get('/mahasiswa/{nama}', function ($nama){
  //  echo "<h2>Halo semua</h2>";
    //echo "Nama saya $nama";
//});

//Route::get('/mahasiswa/{nama?}', function ($nama ='felix'){
  //  echo "<h2>Halo semua</h2>";
    //echo "Nama saya $nama";
//});

Route::get('/profil/{nama?}/{pekerjaan?}', function ($nama ='felix', $pekerjaan ='mahasiswa'){
    echo "<h2>Halo semua</h2>";
    echo "Nama saya $nama, sebagai $pekerjaan";
});

Route::get('/profil/{nama?}/{pekerjaan?}', function ($nama ='felix', $pekerjaan ='mahasiswa'){
    echo "<h2>Halo semua</h2>";
    echo "Nama saya $nama, sebagai $pekerjaan";
})->where('nama', '[A-Z]+');

Route::get('/hubungi', function(){
    echo "<h2>Hubungi kami</h2>";
})->name('call');

Route::redirect('/contact','hubungi');

Route::prefix('dosen')->group(function (){
    Route::get('/jadwal', function(){
        return "<h2>Jadwal</h2>";
    });

    Route::get('/materi', function(){
        return "<h2>Materi Perkuliahan</h2>";
    });
});

Route::get('/mahasiswa/insert', [MahasiswaController::class, 'insert']);
Route::get('/mahasiswa/update', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete', [MahasiswaController::class, 'delete']);
Route::get('/mahasiswa/select', [MahasiswaController::class, 'select']);

Route::get('/mahasiswa/insert-qb', [MahasiswaController::class, 'insertQb']);
Route::get('/mahasiswa/update-qb', [MahasiswaController::class, 'updateQb']);
Route::get('/mahasiswa/delete-qb', [MahasiswaController::class, 'deleteQb']);
Route::get('/mahasiswa/select-qb', [MahasiswaController::class, 'selectQb']);

Route::get('/mahasiswa/insert-elq', [MahasiswaController::class, 'insertElq']);
Route::get('/mahasiswa/update-elq', [MahasiswaController::class, 'updateElq']);
Route::get('/mahasiswa/delete-elq', [MahasiswaController::class, 'deleteElq']);
Route::get('/mahasiswa/select-elq', [MahasiswaController::class, 'selectElq']);