<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAdmin
 * 
 * @property int $id
 * @property int $user_id
 * @property Carbon $fecha_registro
 * 
 * @property User $user
 *
 * @package App\Models
 */
class UserAdmin extends Model
{
	protected $table = 'user_admin';
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
