<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $id
 * @property string $nombre_categoria
 * @property Carbon $fecha_registro
 * 
 * @property Collection|Libro[] $libros
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categorias';
	public $timestamps = false;

	protected $casts = [
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'nombre_categoria',
		'fecha_registro'
	];

	public function libros()
	{
		return $this->hasMany(Libro::class);
	}
}
