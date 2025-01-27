<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DlProdkes extends Model
{
    use HasFactory;

    protected $table = 'dl_prodkes'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'file_path',
    ];
}
