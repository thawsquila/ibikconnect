<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk menambahkan soft deletes ke tabel BEI yang belum punya
 * Untuk audit trail dan data recovery
 */
return new class extends Migration
{
    public function up(): void
    {
        // Add soft deletes to bei_events
        Schema::table('bei_events', function (Blueprint $table) {
            if (!Schema::hasColumn('bei_events', 'deleted_at')) {
                $table->softDeletes();
            }
        });
        
        // Add soft deletes to bei_registrations
        Schema::table('bei_registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('bei_registrations', 'deleted_at')) {
                $table->softDeletes();
            }
        });
        
        // Add soft deletes to bei_educations
        Schema::table('bei_educations', function (Blueprint $table) {
            if (!Schema::hasColumn('bei_educations', 'deleted_at')) {
                $table->softDeletes();
            }
        });
        
        // Add soft deletes to bei_galleries
        Schema::table('bei_galleries', function (Blueprint $table) {
            if (!Schema::hasColumn('bei_galleries', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        Schema::table('bei_events', function (Blueprint $table) {
            if (Schema::hasColumn('bei_events', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
        
        Schema::table('bei_registrations', function (Blueprint $table) {
            if (Schema::hasColumn('bei_registrations', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
        
        Schema::table('bei_educations', function (Blueprint $table) {
            if (Schema::hasColumn('bei_educations', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
        
        Schema::table('bei_galleries', function (Blueprint $table) {
            if (Schema::hasColumn('bei_galleries', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};
