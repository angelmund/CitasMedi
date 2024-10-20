<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property float $precio
 * @property bool $activo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Cita[] $citas
 *
 * @package App\Models
 */
class Servicio extends Model
{
	protected $table = 'servicios';

	protected $casts = [
		'precio' => 'float',
		'activo' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'precio',
		'activo'
	];

	public function citas()
	{
		return $this->belongsToMany(Cita::class, 'citasservicios')
					->withPivot('id')
					->withTimestamps();
	}
}
