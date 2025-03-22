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
        Schema::create('bibliotecario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_completo', 50);
            $table->string('apellido_completo', 50);
            $table->integer('telefono');
            $table->date('fecha_nacimiento');
            $table->integer('user_id');
            $table->timestamp('fecha_registro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bibliotecario');
    }
};
