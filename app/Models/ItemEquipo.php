<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemEquipo extends Model
{
    use HasFactory;

    protected $table ='equipo_items';

    protected $fillable = [
      'codigo',
      'equipo_id',
      'laboratorio_id',
      'estado'
    ];

    protected $guarded = ['id'];

    public function estudianteSolicitudDetalles()
    {
        return $this->hasMany(EstudianteSolicitudDetalle::class);
    }

    public function docenteSolicitudDetalles()
    {
        return $this->hasMany(DocenteSolicitudDetalle::class);
    }

    public function equipo()
    {
      return $this->belongsTo(Equipo::class);
    }

    public function laboratorio()
    {
      return $this->belongsTo(Laboratorio::class);
    }

    public function itemEquipoHistorials()
    {
      return $this->hasMany(ItemEquipoHistorial::class);
    }

    
}
