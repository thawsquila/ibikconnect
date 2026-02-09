<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk tabel pendaftaran event CDC
 * Menyimpan data mahasiswa yang mendaftar ke event
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cdc_event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('cdc_events')->cascadeOnDelete();
            $table->string('name'); // Nama lengkap
            $table->string('email'); // Email
            $table->string('phone', 20); // No telepon
            $table->string('nim', 50); // NIM mahasiswa
            $table->text('message')->nullable(); // Pesan/catatan tambahan
            $table->enum('status', ['pending', 'approved', 'rejected', 'attended'])->default('pending');
            $table->timestamp('registered_at')->useCurrent(); // Waktu pendaftaran
            $table->timestamp('approved_at')->nullable(); // Waktu approval
            $table->softDeletes();
            $table->timestamps();
            
            // Indexes
            $table->index('event_id');
            $table->index('status');
            $table->index('email');
            $table->index('nim');
            
            // Unique constraint: satu mahasiswa hanya bisa daftar 1x per event
            $table->unique(['event_id', 'email'], 'unique_event_email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cdc_event_registrations');
    }
};
