<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SolicitudLibro
 * 
 * @property int $id
 * @property int $estatu_id
 * @property int $lector_id
 * @property int $libro_id
 * @property Carbon $fecha_registro
 * 
 * @property Estatus $estatus
 * @property Libro $libro
 *
 * @package App\Models
 */
class SolicitudLibro extends Model
{
	protected $table = 'solicitud_libro';
	public $timestamps = false;

	protected $casts = [
		'estatu_id' => 'int',
		'lector_id' => 'int',
		'libro_id' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'estatu_id',
		'lector_id',
		'libro_id',
		'fecha_registro'
	];

	public function estatus()
	{
		return $this->belongsTo(Estatus::class, 'estatu_id');
	}

	public function libro()
	{
		return $this->belongsTo(Libro::class);
	}
}
