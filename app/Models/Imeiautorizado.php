<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Imeiautorizado
 * 
 * @property int $id
 * @property int $funcionario_id
 * @property int $eleccion_id
 * @property int $casilla_id
 * @property string $imei
 * 
 * @property Casilla $casilla
 * @property Eleccion $eleccion
 * @property Funcionario $funcionario
 *
 * @package App\Models
 */
class Imeiautorizado extends Model
{
	protected $table = 'imeiautorizado';
	public $timestamps = false;

	protected $casts = [
		'funcionario_id' => 'int',
		'eleccion_id' => 'int',
		'casilla_id' => 'int'
	];

	protected $fillable = [
		'funcionario_id',
		'eleccion_id',
		'casilla_id',
		'imei'
	];

	public function casilla()
	{
		return $this->belongsTo(Casilla::class);
	}

	public function eleccion()
	{
		return $this->belongsTo(Eleccion::class);
	}

	public function funcionario()
	{
		return $this->belongsTo(Funcionario::class);
	}
}
