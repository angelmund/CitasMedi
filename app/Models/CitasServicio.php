<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Citasservicio
 * 
 * @property int $id
 * @property int $cita_id
 * @property int $servicio_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cita $cita
 * @property Servicio $servicio
 *
 * @package App\Models
 */
class Citasservicio extends Model
{
	protected $table = 'citasservicios';

	protected $casts = [
		'cita_id' => 'int',
		'servicio_id' => 'int'
	];

	protected $fillable = [
		'cita_id',
		'servicio_id'
	];

	public function cita()
	{
		return $this->belongsTo(Cita::class);
	}

	public function servicio()
	{
		return $this->belongsTo(Servicio::class);
	}
}
