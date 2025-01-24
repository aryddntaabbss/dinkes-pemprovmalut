<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id(); // Kolom primary key
            $table->string('judul'); // Kolom untuk judul berita
            $table->text('konten'); // Kolom untuk konten berita
            $table->string('gambar')->nullable(); // Kolom untuk gambar (nullable)
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade'); // Relasi ke kategori
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
}
