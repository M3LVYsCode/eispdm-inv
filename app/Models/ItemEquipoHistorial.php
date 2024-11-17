<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemEquipoHistorial extends Model
{
    use HasFactory;
    protected $table = 'equipo_items';

    public function itemEquipo()
    {
      return $this->belongsTo(ItemEquipo::class);
    }
}
