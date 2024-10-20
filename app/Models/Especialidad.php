<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Especialidade
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property bool $activo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Profesione[] $profesiones
 *
 * @package App\Models
 */
class Especialidade extends Model
{
	protected $table = 'especialidades';

	protected $casts = [
		'activo' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'activo'
	];

	public function profesiones()
	{
		return $this->hasMany(Profesione::class, 'especialidad_id');
	}
}
