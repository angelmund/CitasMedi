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
 * @property Carbon $hora
 * @property int $users_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Collection|Servicio[] $servicios
 *
 * @package App\Models
 */
class Cita extends Model
{
	protected $table = 'citas';

	protected $casts = [
		'fecha' => 'datetime',
		'hora' => 'datetime',
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

	public function servicios()
	{
		return $this->belongsToMany(Servicio::class, 'citasservicios')
					->withPivot('id')
					->withTimestamps();
	}
}
