<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda
    protected $table = 'kategori';

    protected $fillable = ['nama_kategori'];

    /**
     * Relasi ke berita (hasMany)
     */
    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    public function informasi()
    {
        return $this->hasMany(Informasi::class);
    }
}
