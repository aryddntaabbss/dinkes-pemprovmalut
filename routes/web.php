<?php

use Illuminate\Http\Request;
use App\Http\Controllers\{
    BeritaController,
    DashboardController,
    DlDocLainxController,
    DlLakipController,
    DlProdkesController,
    DlProfkesController,
    DlRenstraController,
    DtaKesehatanController,
    GaleriController,
    HomeController,
    InformasiController,
    KategoriController,
    ProfileController,
    ProfilPejabatController,
    ProfilController,
    VideoController,
    StrukturOrganisasiController
};
use App\Models\{DtaKesehatan, Informasi, Profil};
use Illuminate\Support\Facades\Route;

// =========================
// Public Routes
// =========================
Route::get('/', [HomeController::class, 'index'])->name('pages.index');
Route::get('/artikel/{id}', [HomeController::class, 'blog'])->name('pages.show');
Route::get('/all-informasi', [HomeController::class, 'allinfo'])->name('pages.allinfo');
Route::get('/info/{id}', [HomeController::class, 'info'])->name('pages.info');

Route::get('/profil/{slug}', fn($slug) => view('pages.blank', ['page' => Profil::where('slug', $slug)->firstOrFail()]));
Route::get('/data-kesehatan/{slug}', fn($slug) => view('pages.blank', ['page' => DtaKesehatan::where('slug', $slug)->firstOrFail()]));

Route::get('/ragam/foto', [HomeController::class, 'galeri'])->name('pages.ragam.foto');
Route::get('/ragam/video', [HomeController::class, 'video'])->name('pages.ragam.video');
Route::get('/unduhan/prod-kesehatan', [HomeController::class, 'prodKes'])->name('pages.unduhan.prod-kesehatan');
Route::get('/unduhan/prof-kesehatan', [HomeController::class, 'profKes'])->name('pages.unduhan.prof-kesehatan');
Route::get('/unduhan/renstra', [HomeController::class, 'renstra'])->name('pages.unduhan.renstra');
Route::get('/unduhan/lakip', [HomeController::class, 'lakip'])->name('pages.unduhan.lakip');
Route::get('/unduhan/doc-lainx', [HomeController::class, 'docLainx'])->name('pages.unduhan.doc-lainx');
Route::get('/profil-pejabat', [HomeController::class, 'pejabat'])->name('pages.pejabat');
Route::get('/struktur-organisasi', [HomeController::class, 'struktur'])->name('pages.struktur-org');
Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

// =========================
// Authenticated Routes
// =========================

// Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

    // Berita Management
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->name('create');
        Route::post('/', [BeritaController::class, 'store'])->name('store');
        Route::get('/{berita}/edit', [BeritaController::class, 'edit'])->name('edit');
        Route::put('/{berita}', [BeritaController::class, 'update'])->name('update');
        Route::get('/{berita}', [BeritaController::class, 'show'])->name('show');
        Route::delete('/{berita}', [BeritaController::class, 'destroy'])->name('destroy');
        Route::put('/{berita}/up', [BeritaController::class, 'updateUp'])->name('update.up');
    });

    // Informasi Management
    Route::prefix('informasi')->name('informasi.')->group(function () {
        Route::get('/', [InformasiController::class, 'index'])->name('index');
        Route::get('/create', [InformasiController::class, 'create'])->name('create');
        Route::post('/', [InformasiController::class, 'store'])->name('store');
        Route::get('/{informasi}/edit', [InformasiController::class, 'edit'])->name('edit');
        Route::put('/{informasi}', [InformasiController::class, 'update'])->name('update');
        Route::get('/{informasi}', [InformasiController::class, 'show'])->name('show');
        Route::delete('/{informasi}', [InformasiController::class, 'destroy'])->name('destroy');
        Route::put('/{informasi}/up', [InformasiController::class, 'updateUp'])->name('update.up');
    });

    // Struktur Organisasi Management
    Route::prefix('struktur-org')->name('struktur.')->group(function () {
        Route::get('/', [StrukturOrganisasiController::class, 'index'])->name('index');
        Route::post('/', [StrukturOrganisasiController::class, 'store'])->name('store');
        Route::delete('/{id}', [StrukturOrganisasiController::class, 'destroy'])->name('destroy');
    });



    // Kategori Management
    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('index');
        Route::get('/create', [KategoriController::class, 'create'])->name('create');
        Route::post('/', [KategoriController::class, 'store'])->name('store');
        Route::get('/{kategori}/edit', [KategoriController::class, 'edit'])->name('edit');
        Route::put('/{kategori}', [KategoriController::class, 'update'])->name('update');
        Route::delete('/{kategori}', [KategoriController::class, 'destroy'])->name('destroy');
        Route::get('/{kategori}', [KategoriController::class, 'show'])->name('show');
    });

    // Profil Management
    Route::prefix('kelola-profil')->group(function () {
        Route::get('profil', [ProfilController::class, 'index'])->name('profil.index');
        Route::get('profil/{profil}', [ProfilController::class, 'show'])->name('profil.show');
        Route::get('/create', [ProfilController::class, 'create'])->name('profil.create');
        Route::post('profil', [ProfilController::class, 'store'])->name('profil.store');
        Route::get('profil/{profil}/edit', [ProfilController::class, 'edit'])->name('profil.edit');
        Route::put('profil/{profil}', [ProfilController::class, 'update'])->name('profil.update');
        Route::delete('profil/{profil}', [ProfilController::class, 'destroy'])->name('profil.destroy');
    });

    // Profil Pejabat Management
    Route::prefix('kelola-profil-pejabat')->group(function () {
        Route::get('/', [ProfilPejabatController::class, 'index'])->name('profil-pejabat.index');
        Route::get('/create', [ProfilPejabatController::class, 'create'])->name('profil-pejabat.create');
        Route::post('/', [ProfilPejabatController::class, 'store'])->name('profil-pejabat.store');
        Route::get('/{pejabat}/edit', [ProfilPejabatController::class, 'edit'])->name('profil-pejabat.edit');
        Route::put('/{pejabat}', [ProfilPejabatController::class, 'update'])->name('profil-pejabat.update');
        Route::delete('/{pejabat}', [ProfilPejabatController::class, 'destroy'])->name('profil-pejabat.destroy');
    });

    // Informasi Management
    // Route::prefix('kelola-informasi')->group(function () {
    //     Route::get('informasi', [InformasiController::class, 'index'])->name('informasi.index');
    //     Route::get('informasi/{informasi}', [InformasiController::class, 'show'])->name('informasi.show');
    //     Route::get('/create', [InformasiController::class, 'create'])->name('informasi.create');
    //     Route::post('informasi', [InformasiController::class, 'store'])->name('informasi.store');
    //     Route::get('informasi/{informasi}/edit', [InformasiController::class, 'edit'])->name('informasi.edit');
    //     Route::put('informasi/{informasi}', [InformasiController::class, 'update'])->name('informasi.update');
    //     Route::delete('informasi/{informasi}', [InformasiController::class, 'destroy'])->name('informasi.destroy');
    // });

    // Data Kesehatan Management
    Route::prefix('kelola-dakes')->group(function () {
        Route::get('data-kesehatan', [DtaKesehatanController::class, 'index'])->name('data-kesehatan.index');
        Route::get('data-kesehatan/{slug}', [DtaKesehatanController::class, 'show'])->name('data-kesehatan.show');
        Route::get('/create', [DtaKesehatanController::class, 'create'])->name('data-kesehatan.create');
        Route::post('data-kesehatan', [DtaKesehatanController::class, 'store'])->name('data-kesehatan.store');
        Route::get('data-kesehatan/{slug}/edit', [DtaKesehatanController::class, 'edit'])->name('data-kesehatan.edit');
        Route::put('data-kesehatan/{slug}', [DtaKesehatanController::class, 'update'])->name('data-kesehatan.update');
        Route::delete('data-kesehatan/{slug}', [DtaKesehatanController::class, 'destroy'])->name('data-kesehatan.destroy');
    });

    // Galeri Management
    Route::prefix('dashboard/ragam')->group(function () {
        Route::get('/galeri', [GaleriController::class, 'index'])->name('dashboard.galeri.index');
        Route::post('/galeri', [GaleriController::class, 'store'])->name('dashboard.galeri.store');
        Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('dashboard.galeri.destroy');

        // Video Management
        Route::get('/videos', [VideoController::class, 'index'])->name('dashboard.videos.index');
        Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
        Route::post('/videos', [VideoController::class, 'store'])->name('dashboard.videos.store');
        Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('dashboard.videos.destroy');
    });

    Route::prefix('dashboard/unduhan')->group(function () {
        // Prod-Kesehatan Management
        Route::get('/prod-kesehatan', [DlProdkesController::class, 'index'])->name('dashboard.prod-kesehatan.index');
        Route::get('/prod-kesehatan/create', [DlProdkesController::class, 'create'])->name('dashboard.prod-kesehatan.create');
        Route::post('/prod-kesehatan', [DlProdkesController::class, 'store'])->name('dashboard.prod-kesehatan.store');
        Route::delete('/prod-kesehatan/{id}', [DlProdkesController::class, 'destroy'])->name('dashboard.prod-kesehatan.destroy');

        // Prof-Kesehatan Management
        Route::get('/prof-kesehatan', [DlProfkesController::class, 'index'])->name('dashboard.prof-kesehatan.index');
        Route::get('/prof-kesehatan/create', [DlProfkesController::class, 'create'])->name('dashboard.prof-kesehatan.create');
        Route::post('/prof-kesehatan', [DlProfkesController::class, 'store'])->name('dashboard.prof-kesehatan.store');
        Route::delete('/prof-kesehatan/{id}', [DlProfkesController::class, 'destroy'])->name('dashboard.prof-kesehatan.destroy');

        // Renstra Management
        Route::get('/renstra', [DlRenstraController::class, 'index'])->name('dashboard.renstra.index');
        Route::get('/renstra/create', [DlRenstraController::class, 'create'])->name('dashboard.renstra.create');
        Route::post('/renstra', [DlRenstraController::class, 'store'])->name('dashboard.renstra.store');
        Route::delete('/renstra/{id}', [DlRenstraController::class, 'destroy'])->name('dashboard.renstra.destroy');

        // Lakip Management
        Route::get('/lakip', [DlLakipController::class, 'index'])->name('dashboard.lakip.index');
        Route::get('/lakip/create', [DlLakipController::class, 'create'])->name('dashboard.lakip.create');
        Route::post('/lakip', [DlLakipController::class, 'store'])->name('dashboard.lakip.store');
        Route::delete('/lakip/{id}', [DlLakipController::class, 'destroy'])->name('dashboard.lakip.destroy');

        // Doc-Lainx Management
        Route::get('/doc-lainx', [DlDocLainxController::class, 'index'])->name('dashboard.doc-lainx.index');
        Route::get('/doc-lainx/create', [DlDocLainxController::class, 'create'])->name('dashboard.doc-lainx.create');
        Route::post('/doc-lainx', [DlDocLainxController::class, 'store'])->name('dashboard.doc-lainx.store');
        Route::delete('/doc-lainx/{id}', [DlDocLainxController::class, 'destroy'])->name('dashboard.doc-lainx.destroy');
    });

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
