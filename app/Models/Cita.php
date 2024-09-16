<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cita
 * 
 * @property int $id
 * @property Carbon $fecha
 * @property time without time zone $hora
 * @property int $users_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|CitasServicio[] $citas_servicios
 *
 * @package App\Models
 */
class Cita extends Model
{
	protected $table = 'citas';

	protected $casts = [
		'fecha' => 'datetime',
		'hora' => 'time without time zone',
		'users_id' => 'int'
	];

	protected $fillable = [
		'fecha',
		'hora',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function citas_servicios()
	{
		return $this->hasMany(CitasServicio::class);
	}
}
