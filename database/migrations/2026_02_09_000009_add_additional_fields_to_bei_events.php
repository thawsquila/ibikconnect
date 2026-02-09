<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk menambahkan field tambahan ke bei_events
 * Untuk fitur yang lebih lengkap seperti kapasitas, banner, dll
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bei_events', function (Blueprint $table) {
            if (!Schema::hasColumn('bei_events', 'max_participants')) {
                $table->integer('max_participants')->nullable()->after('location');
            }
            
            if (!Schema::hasColumn('bei_events', 'registered_count')) {
                $table->integer('registered_count')->default(0)->after('max_participants');
            }
            
            if (!Schema::hasColumn('bei_events', 'banner_image')) {
                $table->string('banner_image')->nullable()->after('registered_count');
            }
            
            if (!Schema::hasColumn('bei_events', 'is_published')) {
                $table->boolean('is_published')->default(true)->after('banner_image');
            }
            
            if (!Schema::hasColumn('bei_events', 'is_registration_open')) {
                $table->boolean('is_registration_open')->default(true)->after('is_published');
            }
        });
    }

    public function down(): void
    {
        Schema::table('bei_events', function (Blueprint $table) {
            $columns = ['max_participants', 'registered_count', 'banner_image', 'is_published', 'is_registration_open'];
            
            foreach ($columns as $column) {
                if (Schema::hasColumn('bei_events', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
