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
        Schema::table('pages', function (Blueprint $table) {
            // Menghapus constraint foreign key
            $table->dropForeign(['menu_id']);
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            // Menambahkan kembali constraint foreign key (jika diperlukan)
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }
};
