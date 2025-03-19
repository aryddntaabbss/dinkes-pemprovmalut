<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'konten',
        'gambar',
        'ket_gambar',
        'kategori_id',
        'penulis',
        'up_berita'
    ];

    /**
     * Relasi ke kategori (belongsTo)
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
