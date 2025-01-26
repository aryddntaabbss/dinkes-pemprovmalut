<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Jalankan migration.
     *
     * @return void
     */
    // Pada file migrasi untuk tabel videos
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video_path');
            $table->timestamps();
        });
    }


    /**
     * Pembatalan migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
