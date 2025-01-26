<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use App\Models\Profil;
use App\Models\Informasi;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('pages.index');
Route::get('/profil/{slug}', function ($slug) {
    $page = Profil::where('slug', $slug)->firstOrFail();
    return view('pages.blank', compact('page'));
});
Route::get('/informasi/{slug}', function ($slug) {
    $page = Informasi::where('slug', $slug)->firstOrFail();
    return view('pages.blank', compact('page'));
});

// Dashboard Routes (auth protected)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('index');

// Berita Routes (auth protected)
Route::middleware(['auth'])->prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('index');
    Route::get('/create', [BeritaController::class, 'create'])->name('create');
    Route::post('/', [BeritaController::class, 'store'])->name('store');
    Route::get('/{berita}/edit', [BeritaController::class, 'edit'])->name('edit');
    Route::put('/{berita}', [BeritaController::class, 'update'])->name('update');
    Route::delete('/{berita}', [BeritaController::class, 'destroy'])->name('destroy');
    Route::get('/{berita}', [BeritaController::class, 'show'])->name('show');  // Disesuaikan dengan parameter 'berita'
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

// Set-Profil Routes (auth protected)
Route::prefix('set-profil')->middleware('auth')->group(function () {
    // Page Routes 
    Route::get('profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::get('profil/{profil}', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('/create', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('profil', [ProfilController::class, 'store'])->name('profil.store');
    Route::get('profil/{profil}/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('profil/{profil}', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('profil/{profil}', [ProfilController::class, 'destroy'])->name('profil.destroy');
});

// Set-Informasi Routes (auth protected)
Route::prefix('set-informasi')->middleware('auth')->group(function () {
    // Page Routes
    Route::get('informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::get('informasi/{informasi}', [InformasiController::class, 'show'])->name('informasi.show');
    Route::get('/create', [InformasiController::class, 'create'])->name('informasi.create');
    Route::post('informasi', [InformasiController::class, 'store'])->name('informasi.store');
    Route::get('informasi/{informasi}/edit', [InformasiController::class, 'edit'])->name('informasi.edit');
    Route::put('informasi/{informasi}', [InformasiController::class, 'update'])->name('informasi.update');
    Route::delete('informasi/{informasi}', [InformasiController::class, 'destroy'])->name('informasi.destroy');
});

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/galeri', [GaleriController::class, 'index'])->name('dashboard.galeri.index');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('dashboard.galeri.store');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('dashboard.galeri.destroy');
});
Route::get('/ragam/foto', [HomeController::class, 'galeri'])->name('pages.ragam.foto');

// Profile Routes (auth protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
