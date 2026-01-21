<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bei_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->nullable()->constrained('bei_events')->nullOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('event_title');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bei_registrations');
    }
};
