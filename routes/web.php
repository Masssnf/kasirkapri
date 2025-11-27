<?php

use App\Http\Controllers\IklanCetakController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\IklanOnlineController;
use App\Http\Controllers\IklanPrianganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiIklanOnlineController;
use App\Http\Controllers\TransaksiIklanPrianganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('iklancetak', IklanCetakController::class)->middleware('auth');
Route::resource('iklanonline', IklanOnlineController::class)->middleware('auth');
Route::resource('iklanpriangan', IklanPrianganController::class)->middleware('auth');
Route::resource('transaksiiklanonline', TransaksiIklanOnlineController::class)->middleware('auth');
Route::resource('transaksipriangan', TransaksiIklanPrianganController::class)->middleware('auth');
Route::get('/transaksionline/create', [TransaksiiklanonlineController::class, 'create'])
    ->name('transaksiiklanonline.create');
Route::post('/transaksionline/store', [TransaksiiklanonlineController::class, 'store'])
    ->name('transaksiiklanonline.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
