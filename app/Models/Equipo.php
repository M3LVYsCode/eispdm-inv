<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Equipo extends Model
{
    use HasFactory;
    //asignación Masiva
    protected $fillable =[
        'nombre',
        'descripcion',
        'cantidad',
        'unidad',
        'observaciones',
        'estado',
        'ruta_imagen'
        
    ];
    protected $guarded = ['id'];

    //Relaciones
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
    public function itemEquipos()
    {
        return $this->hasMany(ItemEquipo::class);
    }

}
