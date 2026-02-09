<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bei_registrations', function (Blueprint $table) {
            if (!Schema::hasColumn('bei_registrations', 'nim')) {
                $table->string('nim', 50)->nullable()->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('bei_registrations', function (Blueprint $table) {
            if (Schema::hasColumn('bei_registrations', 'nim')) {
                $table->dropColumn('nim');
            }
        });
    }
};
