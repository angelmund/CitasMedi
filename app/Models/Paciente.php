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
 * @property string|null $telefono
 * @property int $id_usuario
 * @property bool $activo
 * @property int|null $expediente_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ExpedientesMedico|null $expedientes_medico
 * @property User $user
 *
 * @package App\Models
 */
class Paciente extends Model
{
	protected $table = 'pacientes';

	protected $casts = [
		'id_usuario' => 'int',
		'activo' => 'bool',
		'expediente_id' => 'int'
	];

	protected $fillable = [
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'telefono',
		'id_usuario',
		'activo',
		'expediente_id'
	];

	public function expedientes_medico()
	{
		return $this->belongsTo(ExpedientesMedico::class, 'expediente_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}
}
