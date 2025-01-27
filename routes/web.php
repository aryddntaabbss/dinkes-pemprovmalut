<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\DlProdkesController;
use App\Http\Controllers\DlProfkesController;
use App\Http\Controllers\DlRenstraController;
use App\Http\Controllers\DlLakipController;
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

// Ragam Foto Routes (auth protected)
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/galeri', [GaleriController::class, 'index'])->name('dashboard.galeri.index');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('dashboard.galeri.store');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('dashboard.galeri.destroy');
});
Route::get('/ragam/foto', [HomeController::class, 'galeri'])->name('pages.ragam.foto');

// Ragam Video Routes (auth protected)
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/videos', [VideoController::class, 'index'])->name('dashboard.videos.index');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoController::class, 'store'])->name('dashboard.videos.store');
    Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('dashboard.videos.destroy');
});
Route::get('/ragam/video', [HomeController::class, 'video'])->name('pages.ragam.video');

// Unduhan Prod-Kesehatan Routes (auth protected)
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/prod-kesehatan', [DlProdkesController::class, 'index'])->name('dashboard.prod-kesehatan.index');
    Route::get('/prod-kesehatan/create', [DlProdkesController::class, 'create'])->name('dashboard.prod-kesehatan.create');
    Route::post('/prod-kesehatan', [DlProdkesController::class, 'store'])->name('dashboard.prod-kesehatan.store');
    Route::delete('/prod-kesehatan/{id}', [DlProdkesController::class, 'destroy'])->name('dashboard.prod-kesehatan.destroy');
});
Route::get('/unduhan/prod-kesehatan', [HomeController::class, 'prodKes'])->name('pages.unduhan.prod-kesehatan');

// Unduhan Prof-Kesehatan Routes (auth protected)
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/prof-kesehatan', [DlProfkesController::class, 'index'])->name('dashboard.prof-kesehatan.index');
    Route::get('/prof-kesehatan/create', [DlProfkesController::class, 'create'])->name('dashboard.prof-kesehatan.create');
    Route::post('/prof-kesehatan', [DlProfkesController::class, 'store'])->name('dashboard.prof-kesehatan.store');
    Route::delete('/prof-kesehatan/{id}', [DlProfkesController::class, 'destroy'])->name('dashboard.prof-kesehatan.destroy');
});
Route::get('/unduhan/prof-kesehatan', [HomeController::class, 'profKes'])->name('pages.unduhan.prof-kesehatan');

// Unduhan Renstra Routes (auth protected)
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/renstra', [DlRenstraController::class, 'index'])->name('dashboard.renstra.index');
    Route::get('/renstra/create', [DlRenstraController::class, 'create'])->name('dashboard.renstra.create');
    Route::post('/renstra', [DlRenstraController::class, 'store'])->name('dashboard.renstra.store');
    Route::delete('/renstra/{id}', [DlRenstraController::class, 'destroy'])->name('dashboard.renstra.destroy');
});
Route::get('/unduhan/renstra', [HomeController::class, 'renstra'])->name('pages.unduhan.renstra');

// Unduhan Lakip Routes (auth protected)
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/lakip', [DlLakipController::class, 'index'])->name('dashboard.lakip.index');
    Route::get('/lakip/create', [DlLakipController::class, 'create'])->name('dashboard.lakip.create');
    Route::post('/lakip', [DlLakipController::class, 'store'])->name('dashboard.lakip.store');
    Route::delete('/lakip/{id}', [DlLakipController::class, 'destroy'])->name('dashboard.lakip.destroy');
});
Route::get('/unduhan/lakip', [HomeController::class, 'lakip'])->name('pages.unduhan.lakip');

// Profile Routes (auth protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
