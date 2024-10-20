<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profesione
 * 
 * @property int $id
 * @property string $nombre
 * @property string $apellido_materno
 * @property string $apellido_paterno
 * @property int $especialidad_id
 * @property int $usuario_id
 * @property Carbon $created_at
 * @property Carbon $updatedd_at
 * 
 * @property Especialidade $especialidade
 * @property User $user
 *
 * @package App\Models
 */
class Profesione extends Model
{
	protected $table = 'profesiones';
	public $timestamps = false;

	protected $casts = [
		'especialidad_id' => 'int',
		'usuario_id' => 'int',
		'updatedd_at' => 'datetime'
	];

	protected $fillable = [
		'nombre',
		'apellido_materno',
		'apellido_paterno',
		'especialidad_id',
		'usuario_id',
		'updatedd_at'
	];

	public function especialidade()
	{
		return $this->belongsTo(Especialidad::class, 'especialidad_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'usuario_id');
	}
}
