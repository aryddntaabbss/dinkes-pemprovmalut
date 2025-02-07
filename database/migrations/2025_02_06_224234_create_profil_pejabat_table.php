<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profil_pejabat', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan');
            $table->string('nama_pejabat');
            $table->string('pangkat_golongan');
            $table->string('nip')->unique();
            $table->string('pendidikan');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profil_pejabat');
    }
};
