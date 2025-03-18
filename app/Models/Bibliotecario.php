<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bibliotecario
 * 
 * @property int $id
 * @property string $nombre_completo
 * @property string $apellido_completo
 * @property int $telefono
 * @property Carbon $fecha_nacimiento
 * @property int $user_id
 * @property Carbon $fecha_registro
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Bibliotecario extends Model
{
	protected $table = 'bibliotecario';
	public $timestamps = false;

	protected $casts = [
		'telefono' => 'int',
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
