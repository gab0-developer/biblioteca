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
        Schema::table('libros', function (Blueprint $table) {
            $table->foreign(['categoria_id'], 'fk_libros_categoria')->references(['id'])->on('categorias')->onUpdate('no action')->onDelete('restrict');
            $table->foreign(['estatu_id'], 'fk_libros_estatus')->references(['id'])->on('estatus')->onUpdate('no action')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->dropForeign('fk_libros_categoria');
            $table->dropForeign('fk_libros_estatus');
        });
    }
};
