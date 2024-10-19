<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $apPaterno
 * @property string $apMaterno
 * @property string $email
 * @property string $telefono
 * @property bool $activo
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property Carbon|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Cita[] $citas
 * @property Collection|Profesione[] $profesiones
 *
 * @package App\Models
 */

 class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

	protected $table = 'users';

	protected $casts = [
		'activo' => 'bool',
		'email_verified_at' => 'datetime',
		'two_factor_confirmed_at' => 'datetime',
		'current_team_id' => 'int'
	];

	protected $hidden = [
		'password',
		'two_factor_secret',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'apPaterno',
		'apMaterno',
		'email',
		'telefono',
		'activo',
		'email_verified_at',
		'password',
		'two_factor_secret',
		'two_factor_recovery_codes',
		'two_factor_confirmed_at',
		'remember_token',
		'current_team_id',
		'profile_photo_path'
	];

	public function citas()
	{
		return $this->hasMany(Cita::class, 'users_id');
	}

	public function profesiones()
	{
		return $this->hasMany(Profesione::class, 'usuario_id');
	}
}
