<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DlDocLainx extends Model
{
    use HasFactory;

    protected $table = 'dl_doc_lainx'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'file_path',
    ];
}
