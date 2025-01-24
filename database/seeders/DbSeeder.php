<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DbSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan 10 kategori medis
        $kategoriData = [
            'Kesehatan Umum',
            'Penyakit Menular',
            'Gizi & Nutrisi',
            'Kesehatan Ibu & Anak',
            'Layanan Kesehatan',
            'Info Vaksinasi',
            'Farmasi & Obat-obatan',
            'Kesehatan Mental',
            'Kesehatan Lingkungan',
            'Perawatan Jangka Panjang'
        ];

        foreach ($kategoriData as $kategori) {
            Kategori::create([
                'nama_kategori' => $kategori
            ]);
        }

        // Menambahkan 3 berita tentang dunia medis
        $beritaData = [
            [
                'judul' => 'Pentingnya Vaksinasi untuk Kesehatan Masyarakat',
                'konten' => 'Vaksinasi merupakan langkah penting dalam mencegah penyakit menular yang dapat mengancam kesehatan masyarakat. Setiap orang disarankan untuk mengikuti program vaksinasi yang tersedia.',
                'kategori_id' => Kategori::where('nama_kategori', 'Info Vaksinasi')->first()->id,
                'gambar' => 'image1.jpg', // Pastikan gambar ini ada di folder public/storage
            ],
            [
                'judul' => 'Gizi Seimbang untuk Pertumbuhan Anak',
                'konten' => 'Pemberian gizi seimbang sejak dini sangat penting untuk menunjang pertumbuhan dan perkembangan anak. Pemenuhan kebutuhan gizi harus diperhatikan secara serius oleh orang tua.',
                'kategori_id' => Kategori::where('nama_kategori', 'Gizi & Nutrisi')->first()->id,
                'gambar' => 'image2.jpg', // Pastikan gambar ini ada di folder public/storage
            ],
            [
                'judul' => 'Penyakit Menular dan Cara Penanganannya',
                'konten' => 'Penyakit menular seperti tuberkulosis, flu, dan hepatitis dapat dicegah dengan langkah-langkah pencegahan yang tepat. Penting untuk mengetahui cara penanganannya agar tidak terjadi penyebaran.',
                'kategori_id' => Kategori::where('nama_kategori', 'Penyakit Menular')->first()->id,
                'gambar' => 'image3.jpg', // Pastikan gambar ini ada di folder public/storage
            ]
        ];

        foreach ($beritaData as $berita) {
            Berita::create($berita);
        }

        // Membuat user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
