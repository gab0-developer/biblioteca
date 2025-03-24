<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW \"libros_view\" AS SELECT li.id,
    li.titulo,
    li.autor,
    li.editorial,
    li.cantidad,
    li.fecha_publicacion,
    li.fecha_registro,
    li.imagen,
    ca.nombre_categoria,
    es.estatu,
    li.categoria_id,
    li.estatu_id
   FROM ((libros li
     JOIN categorias ca ON ((ca.id = li.categoria_id)))
     JOIN estatus es ON ((es.id = li.estatu_id)))
  ORDER BY li.id DESC;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"libros_view\"");
    }
};
