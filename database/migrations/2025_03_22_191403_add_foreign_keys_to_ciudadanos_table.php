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
        Schema::table('ciudadanos', function (Blueprint $table) {
            $table->foreign(['user_id'], 'fk_ciudadanos_user')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ciudadanos', function (Blueprint $table) {
            $table->dropForeign('fk_ciudadanos_user');
        });
    }
};
