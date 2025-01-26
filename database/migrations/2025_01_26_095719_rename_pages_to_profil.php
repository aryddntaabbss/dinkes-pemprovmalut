<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePagesToProfil extends Migration
{
    /**
     * Menjalankan migration untuk mengubah nama tabel.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('pages', 'profil');
    }

    /**
     * Membalikkan migration untuk mengembalikan nama tabel ke semula.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('profil', 'pages');
    }
}
