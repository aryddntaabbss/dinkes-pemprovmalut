<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPejabat extends Model
{
    use HasFactory;
    protected $table = 'profil_pejabat';
    protected $fillable = [
        'jabatan',
        'nama_pejabat',
        'pangkat_golongan',
        'nip',
        'pendidikan',
        'foto'
    ];
}
