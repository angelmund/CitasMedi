<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 * 
 * @property int $id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property int $telefono
 * @property string $correo
 * @property int|null $expediente_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ExpedientesMedico|null $expedientes_medico
 *
 * @package App\Models
 */
class Paciente extends Model
{
	protected $table = 'pacientes';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'telefono' => 'int',
		'expediente_id' => 'int'
	];

	protected $fillable = [
		'id',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'telefono',
		'correo',
		'expediente_id'
	];

	public function expedientes_medico()
	{
		return $this->belongsTo(ExpedientesMedico::class, 'expediente_id');
	}
}
