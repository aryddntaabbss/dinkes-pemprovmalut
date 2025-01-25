<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->string('penulis')->nullable(); // Menambahkan kolom penulis
            $table->boolean('up_berita')->default(false); // Menambahkan kolom up_berita (centang)
        });
    }

    public function down()
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropColumn(['penulis', 'up_berita']); // Menghapus kolom yang baru ditambahkan
        });
    }
};
