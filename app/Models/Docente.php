<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

		protected $table = 'docentes';

		protected $fillable = [
			'nombres',
			'apellido_paterno',
			'apellido_materno',
			'ci',
			'domicilio',
			'telefono',
			'email',
			'password',
	];

	protected $hidden = [
			'password',
			'remember_token',
	];

	protected $casts = [
			'email_verified_at' => 'datetime',
	];

	public function proyectos()
	{
			return $this->hasMany(Proyecto::class);
	}
	public function solicitudes()
	{
			return $this->hasMany(DocenteSolicitud::class);
	}

}
