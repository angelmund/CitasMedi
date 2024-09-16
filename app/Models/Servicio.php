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
 * @property float $precio
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|CitasServicio[] $citas_servicios
 *
 * @package App\Models
 */
class Servicio extends Model
{
	protected $table = 'servicios';

	protected $casts = [
		'precio' => 'float'
	];

	protected $fillable = [
		'nombre',
		'precio'
	];

	public function citas_servicios()
	{
		return $this->hasMany(CitasServicio::class);
	}
}
