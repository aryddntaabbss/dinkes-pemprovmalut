<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    // Tentukan kolom yang bisa diisi
    protected $fillable = ['title', 'ket_video', 'video_path'];

    public function setVideoPathAttribute($value)
    {
        $this->attributes['video_path'] = '' . $value;
    }
}
