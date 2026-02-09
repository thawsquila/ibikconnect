<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk tabel lowongan kerja dan magang CDC
 * Menyimpan informasi job postings yang ditampilkan di halaman CDC
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cdc_job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Posisi pekerjaan
            $table->string('company_name'); // Nama perusahaan
            $table->string('company_logo')->nullable(); // Path logo perusahaan
            $table->string('location'); // Lokasi kerja
            $table->enum('type', ['full-time', 'part-time', 'internship', 'freelance', 'contract'])->default('full-time');
            $table->string('salary_range')->nullable(); // Range gaji (e.g., "Rp 5-7 jt")
            $table->text('description')->nullable(); // Deskripsi pekerjaan
            $table->text('requirements')->nullable(); // Persyaratan
            $table->text('benefits')->nullable(); // Benefit yang ditawarkan
            $table->date('deadline')->nullable(); // Batas waktu pendaftaran
            $table->string('application_url')->nullable(); // Link eksternal untuk apply
            $table->boolean('is_active')->default(true); // Status aktif/tidak
            $table->integer('views_count')->default(0); // Jumlah views
            $table->softDeletes(); // Soft delete untuk audit trail
            $table->timestamps();
            
            // Indexes untuk performa query
            $table->index('is_active');
            $table->index('type');
            $table->index('deadline');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cdc_job_listings');
    }
};
