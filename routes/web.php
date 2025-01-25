<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('pages.index');

// Berita Routes (auth protected)
Route::middleware(['auth'])->prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('index');
    Route::get('/create', [BeritaController::class, 'create'])->name('create');
    Route::post('/', [BeritaController::class, 'store'])->name('store');
    Route::get('/{berita}/edit', [BeritaController::class, 'edit'])->name('edit');
    Route::put('/{berita}', [BeritaController::class, 'update'])->name('update');
    Route::delete('/{berita}', [BeritaController::class, 'destroy'])->name('destroy');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('show');
    Route::put('/{berita}/up', [BeritaController::class, 'updateUp'])->name('update.up');
});

// Kategori Routes (auth protected)
Route::middleware(['auth'])->prefix('kategori')->name('kategori.')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('index');
    Route::get('/create', [KategoriController::class, 'create'])->name('create');
    Route::post('/', [KategoriController::class, 'store'])->name('store');
    Route::get('/{kategori}/edit', [KategoriController::class, 'edit'])->name('edit');
    Route::put('/{kategori}', [KategoriController::class, 'update'])->name('update');
    Route::delete('/{kategori}', [KategoriController::class, 'destroy'])->name('destroy');
    Route::get('/{kategori}', [KategoriController::class, 'show'])->name('show');
});

// Dashboard Route (auth protected)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes (auth protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
