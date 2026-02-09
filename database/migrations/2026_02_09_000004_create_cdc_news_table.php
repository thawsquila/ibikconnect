<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk tabel berita dan dokumentasi CDC
 * Menyimpan artikel berita, prestasi, dan dokumentasi kegiatan
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cdc_news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul berita
            $table->string('slug')->unique(); // URL-friendly slug
            $table->text('excerpt')->nullable(); // Ringkasan singkat
            $table->longText('content')->nullable(); // Konten lengkap
            $table->string('featured_image')->nullable(); // Gambar utama
            $table->string('category'); // Kategori: Prestasi, Kegiatan, Workshop, Alumni, dll
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete(); // Penulis
            $table->integer('views_count')->default(0); // Jumlah views
            $table->boolean('is_published')->default(false); // Status publish
            $table->timestamp('published_at')->nullable(); // Tanggal publish
            $table->softDeletes();
            $table->timestamps();
            
            // Indexes
            $table->index('slug');
            $table->index('category');
            $table->index('is_published');
            $table->index('published_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cdc_news');
    }
};
