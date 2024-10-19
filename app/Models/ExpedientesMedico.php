<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpedientesMedico
 * 
 * @property int $id
 * @property string $padecimiento_actual
 * @property string $diagnósticos
 * @property string $tratamientos
 * @property string $evolucion
 * @property string $estudios_delaboratorio
 * @property string $gabinete
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Paciente $paciente
 *
 * @package App\Models
 */
class ExpedientesMedico extends Model
{
	protected $table = 'expedientes_medicos';

	protected $fillable = [
		'padecimiento_actual',
		'diagnósticos',
		'tratamientos',
		'evolucion',
		'estudios_delaboratorio',
		'gabinete'
	];

	public function paciente()
	{
		return $this->hasOne(Paciente::class, 'expediente_id');
	}
}
