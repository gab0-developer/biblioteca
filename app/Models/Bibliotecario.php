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
		'user_id' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'fecha_registro'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
