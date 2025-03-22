<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ciudadano
 * 
 * @property int $id
 * @property string $nombre_completo
 * @property string $apellido_completo
 * @property string|null $telefono
 * @property Carbon $fecha_nacimiento
 * @property int $user_id
 * @property Carbon|null $fecha_registro
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Ciudadano extends Model
{
	protected $table = 'ciudadanos';
	public $timestamps = false;

	protected $casts = [
		'fecha_nacimiento' => 'datetime',
		'user_id' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'nombre_completo',
		'apellido_completo',
		'telefono',
		'fecha_nacimiento',
		'user_id',
		'fecha_registro'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
