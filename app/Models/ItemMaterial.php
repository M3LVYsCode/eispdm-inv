<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMaterial extends Model
{
    use HasFactory;

    protected $table = 'material_items';

    protected $fillable =[
        'codigo',
        'estado'      
    ];

    protected $guarded = [
        'id',
        'material_id',
        'laboratorio_id'
    ];
    
    public function itemMaterialHistorials()
    {
      return $this->hasMany(ItemMaterialHistorial::class);
    }

    public function laboratorio()
    {
      return $this->belongsTo(Laboratorio::class);
    }

    public function material()
    {
      return $this->belongsTo(Material::class);
    }


    
}
