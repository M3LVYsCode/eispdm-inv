<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;
    protected $fillable =[
        "nombre"
        
    ];
    protected $guarded = ['id'];


    public function itemMaterials()
    {
      return $this->hasMany(ItemMaterial::class);
    }
    public function itemEquipos()
    {
      return $this->hasMany(ItemEquipo::class);
    }

    
}
