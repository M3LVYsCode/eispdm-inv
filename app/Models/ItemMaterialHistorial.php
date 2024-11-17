<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ItemMaterialHistorial extends Model
{
    use HasFactory;

    protected $table = 'material_item_historials';

    protected $fillable =[
        'estado',
        'diagnostico',
        'recomendacion',
    ];
    
    protected $guarded = [
        'id',
        'material_item_id',
        'user_id'
    ];

    public function users()
    {
      return $this->belongsTo(User::class);
    }

    public function itemMaterials()
    {
      return $this->belongsTo(ItemMaterial::class);
    }
    
}
