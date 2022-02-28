<?php

use App\Http\Controllers\{PatientController, PenyakitController, PeriksaController};
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

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');

    Route::resource('patient', PatientController::class);
    Route::get('patient-list', [PatientController::class, 'getPatient'])->name('patient.list');

    Route::resource('penyakit', PenyakitController::class);
    Route::get('penyakit-list', [PenyakitController::class, 'getPenyakit'])->name('penyakit.list');

    Route::resource('periksa', PeriksaController::class);
});
Route::get('/greeting', function () {
    return 'Hello World';
})->name('greeting');

require __DIR__.'/auth.php';
