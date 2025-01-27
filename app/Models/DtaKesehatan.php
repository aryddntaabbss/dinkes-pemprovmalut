<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DtaKesehatan extends Model
{
    use HasFactory;

    protected $table = 'dtakesehatan';
    protected $fillable = [
        'name',
        'slug',
        'content',
        'status'
    ];
}
