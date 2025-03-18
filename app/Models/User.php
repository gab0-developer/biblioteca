<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
// ESTAS SON DEL PAQUETE LARAVEL RELESE MODEL GENERATOR
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property Carbon|null $two_factor_confirmed_at
 * 
 * @property Collection|UserAdmin[] $user_admins
 * @property Collection|Bibliotecario[] $bibliotecarios
 * @property Collection|Lector[] $lectors
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'current_team_id' => 'int',
		'two_factor_confirmed_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token',
		'two_factor_secret'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'current_team_id',
		'profile_photo_path',
		'two_factor_secret',
		'two_factor_recovery_codes',
		'two_factor_confirmed_at'
	];
/**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

	// inlcuir foto perfil de usuario
	public function adminlte_image()
    {
        return url($this->profile_photo_url);
    }
    public function adminlte_profile_url()
    {
        return url('user/profile');
    }
	// relaciones de tablas-models
	public function user_admins()
	{
		return $this->hasMany(UserAdmin::class);
	}

	public function bibliotecarios()
	{
		return $this->hasMany(Bibliotecario::class);
	}

	public function lectors()
	{
		return $this->hasMany(Lector::class);
	}
}
