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
        Schema::table('user_admin', function (Blueprint $table) {
            $table->string('telefono', 15)->change(); // Cambia el tipo de dato a string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_admin', function (Blueprint $table) {
            $table->integer('telefono')->change(); // Revertir el cambio si es necesario
        });
    }
};
