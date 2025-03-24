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
            $table->foreign(['ciudadano_id'], 'fk_ciudadano')->references(['id'])->on('ciudadanos')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['estatu_id'], 'fk_estatu')->references(['id'])->on('estatus')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['libro_id'], 'fk_libro')->references(['id'])->on('libros')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitud_libro', function (Blueprint $table) {
            $table->dropForeign('fk_ciudadano');
            $table->dropForeign('fk_estatu');
            $table->dropForeign('fk_libro');
        });
    }
};
