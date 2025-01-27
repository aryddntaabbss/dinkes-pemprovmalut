<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DlRenstra extends Model
{
    use HasFactory;

    protected $table = 'dl_renstra'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'file_path',
    ];
}
