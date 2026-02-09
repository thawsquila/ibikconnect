<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk tabel galeri foto CDC
 * Menyimpan dokumentasi foto kegiatan CDC
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cdc_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->nullable()->constrained('cdc_events')->nullOnDelete(); // Relasi ke event
            $table->foreignId('news_id')->nullable()->constrained('cdc_news')->nullOnDelete(); // Relasi ke news
            $table->string('title')->nullable(); // Judul foto
            $table->text('description')->nullable(); // Deskripsi
            $table->string('image_path'); // Path file gambar
            $table->string('thumbnail_path')->nullable(); // Path thumbnail
            $table->integer('display_order')->default(0); // Urutan tampilan
            $table->boolean('is_featured')->default(false); // Foto unggulan
            $table->softDeletes();
            $table->timestamps();
            
            // Indexes
            $table->index('event_id');
            $table->index('news_id');
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cdc_galleries');
    }
};
