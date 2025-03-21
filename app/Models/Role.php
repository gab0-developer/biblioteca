<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Permission[] $permissions
 * @property Collection|ModelHasRole[] $model_has_roles
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = [
		'id',
		'name',
		'guard_name'
	];

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'role_has_permissions');
	}

	public function model_has_roles()
	{
		return $this->hasMany(ModelHasRole::class);
	}
}
