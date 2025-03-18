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
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 50);
            $table->string('autor', 50);
            $table->string('editorial', 50);
            $table->integer('cantidad');
            $table->date('fecha_publicacion');
            $table->timestamp('fecha_registro')->useCurrent();
            $table->integer('categoria_id');
            $table->integer('estatu_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
