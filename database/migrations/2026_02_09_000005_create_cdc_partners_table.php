<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk tabel mitra/partner CDC
 * Menyimpan informasi perusahaan partner dan afiliasi
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cdc_partners', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama perusahaan/institusi
            $table->string('logo_path'); // Path logo
            $table->string('website_url')->nullable(); // Website
            $table->text('description')->nullable(); // Deskripsi singkat
            $table->enum('type', ['corporate', 'education', 'government', 'ngo', 'other'])->default('corporate');
            $table->integer('display_order')->default(0); // Urutan tampilan
            $table->boolean('is_active')->default(true); // Status aktif
            $table->softDeletes();
            $table->timestamps();
            
            // Indexes
            $table->index('is_active');
            $table->index('display_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cdc_partners');
    }
};
