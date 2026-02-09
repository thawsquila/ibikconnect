<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk tabel agenda/event CDC
 * Menyimpan kegiatan seperti seminar, workshop, job fair, dll
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cdc_events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul event
            $table->text('description')->nullable(); // Deskripsi lengkap
            $table->dateTime('start_date'); // Tanggal & waktu mulai
            $table->dateTime('end_date')->nullable(); // Tanggal & waktu selesai
            $table->string('location'); // Lokasi event
            $table->string('event_type')->nullable(); // Tipe: seminar, workshop, job fair, dll
            $table->integer('max_participants')->nullable(); // Kapasitas maksimal
            $table->integer('registered_count')->default(0); // Jumlah yang sudah daftar
            $table->string('banner_image')->nullable(); // Path gambar banner
            $table->text('requirements')->nullable(); // Persyaratan peserta
            $table->boolean('is_published')->default(true); // Status publish
            $table->boolean('is_registration_open')->default(true); // Status pendaftaran
            $table->softDeletes();
            $table->timestamps();
            
            // Indexes
            $table->index('start_date');
            $table->index('is_published');
            $table->index('is_registration_open');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cdc_events');
    }
};
