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
        Schema::table('solicitud_libro', function (Blueprint $table) {
            $table->foreign(['estatu_id'], 'fk_solicitud_libro_estatus')->references(['id'])->on('estatus')->onUpdate('no action')->onDelete('restrict');
            $table->foreign(['lector_id'], 'fk_solicitud_libro_lector')->references(['id'])->on('lector')->onUpdate('no action')->onDelete('restrict');
            $table->foreign(['libro_id'], 'fk_solicitud_libro_libro')->references(['id'])->on('libros')->onUpdate('no action')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitud_libro', function (Blueprint $table) {
            $table->dropForeign('fk_solicitud_libro_estatus');
            $table->dropForeign('fk_solicitud_libro_lector');
            $table->dropForeign('fk_solicitud_libro_libro');
        });
    }
};
