<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Material extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre',
        'descripcion',
        'cantidad_disponible',
        'unidad',
        'observaciones',
        'estado',
        'ruta_imagen'
        
    ];
    protected $guarded = ['id'];



    public function itemMaterials()
    {
      return $this->hasMany(ItemMaterial::class);
    }


    



}
