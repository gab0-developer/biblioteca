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
        Schema::create('ciudadanos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_completo', 100);
            $table->string('apellido_completo', 100);
            $table->string('telefono', 15)->nullable();
            $table->date('fecha_nacimiento');
            $table->integer('user_id');
            $table->timestamp('fecha_registro')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudadanos');
    }
};
