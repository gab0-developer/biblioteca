<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Libro
 * 
 * @property int $id
 * @property string $titulo
 * @property string $autor
 * @property string $editorial
 * @property int $cantidad
 * @property Carbon $fecha_publicacion
 * @property Carbon $fecha_registro
 * @property int $categoria_id
 * @property int $estatu_id
 * @property string|null $imagen
 * 
 * @property Categoria $categoria
 * @property Estatus $estatus
 * @property Collection|SolicitudLibro[] $solicitud_libros
 *
 * @package App\Models
 */
class Libro extends Model
{
	protected $table = 'libros';
	public $timestamps = false;

	protected $casts = [
		'cantidad' => 'int',
		'fecha_publicacion' => 'datetime',
		'fecha_registro' => 'datetime',
		'categoria_id' => 'int',
		'estatu_id' => 'int'
	];

	protected $fillable = [
		'titulo',
		'autor',
		'editorial',
		'cantidad',
		'fecha_publicacion',
		'fecha_registro',
		'categoria_id',
		'estatu_id',
		'imagen'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class);
	}

	public function estatus()
	{
		return $this->belongsTo(Estatus::class, 'estatu_id');
	}

	public function solicitud_libros()
	{
		return $this->hasMany(SolicitudLibro::class);
	}
}
