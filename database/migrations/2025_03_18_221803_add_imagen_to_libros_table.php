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
        Schema::table('library.libros', function (Blueprint $table) {
            $table->string('imagen', 255)->nullable()->after('cantidad'); // Agrega la columna `imagen`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('library.libros', function (Blueprint $table) {
            $table->dropColumn('imagen'); // Elimina la columna `imagen` si se revierte la migración
        });
    }
};
