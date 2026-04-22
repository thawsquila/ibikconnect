<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bei_registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('bei_registrations', 'phone')) {
                $table->string('phone', 20)->nullable()->after('email');
            }
            if (!Schema::hasColumn('bei_registrations', 'message')) {
                $table->text('message')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('bei_registrations', 'status')) {
                $table->string('status')->default('pending')->after('message');
            }
        });
    }

    public function down(): void
    {
        Schema::table('bei_registrations', function (Blueprint $table) {
            foreach (['phone', 'message', 'status'] as $col) {
                if (Schema::hasColumn('bei_registrations', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
