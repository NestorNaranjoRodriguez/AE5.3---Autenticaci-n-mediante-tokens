<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contact', function (Blueprint $table) {
            if (!Schema::hasColumn('contact', 'direccion')) {
                $table->string('direccion')->nullable();
            }
            if (!Schema::hasColumn('contact', 'direccion_secundaria')) {
                $table->string('direccion_secundaria')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact', function (Blueprint $table) {
            if (Schema::hasColumn('contact', 'direccion')) {
                $table->dropColumn('direccion');
            }
            if (Schema::hasColumn('contact', 'direccion_secundaria')) {
                $table->dropColumn('direccion_secundaria');
            }
        });
    }
};
