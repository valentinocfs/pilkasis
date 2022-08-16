<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KandidatController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    // Siswa
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/siswa', function () {
        return view('siswa.index');
    });
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/import', [SiswaController::class, 'importexcel']);
    Route::put('/siswa/{id}/update', [SiswaController::class, 'update']);
    // Kandidat
    Route::get('/kandidat', [KandidatController::class, 'index']);
    Route::post('/kandidat/insert', [KandidatController::class, 'insert']);
    Route::get('/kandidat/{kandidat}/edit', [KandidatController::class, 'edit']);
    Route::post('/kandidat/{id}/update', [KandidatController::class, 'update']);
    Route::get('/kandidat/{id}/delete', [KandidatController::class, 'delete']);
});

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa']], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/add_vote/{id}', [HomeController::class, 'add']);
    Route::get("/kontak", function () {
        return view("kontak");
    });
    Route::get("/profile", [HomeController::class, 'profile']);
    Route::post("/profile/changePassword", [HomeController::class, 'changePassword']);
});
