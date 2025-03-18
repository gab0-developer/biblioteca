<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estatus
 * 
 * @property int $id
 * @property string $estatu
 * @property Carbon $fecha_registro
 * 
 * @property Collection|Libro[] $libros
 * @property Collection|SolicitudLibro[] $solicitud_libros
 *
 * @package App\Models
 */
class Estatus extends Model
{
	protected $table = 'estatus';
	public $timestamps = false;

	protected $casts = [
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'estatu',
		'fecha_registro'
	];

	public function libros()
	{
		return $this->hasMany(Libro::class, 'estatu_id');
	}

	public function solicitud_libros()
	{
		return $this->hasMany(SolicitudLibro::class, 'estatu_id');
	}
}
