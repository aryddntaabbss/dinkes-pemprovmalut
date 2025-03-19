<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda
    protected $table = 'informasi';

    protected $fillable = [
        'judul',
        'konten',
        'gambar',
        'ket_gambar',
        'kategori_id',
        'up_informasi'
    ];

    /**
     * Relasi ke kategori (belongsTo)
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
