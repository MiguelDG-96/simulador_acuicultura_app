<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostoDetalle extends Model
{
    //
    protected $fillable = [
        'simulacion_id',
        'costo_categoria_id',
        'nombre_item',
        'monto',
        'unidad',
    ];
    public function simulacion()
    {
        return $this->belongsTo(Simulacion::class);
    }
    public function categoria()
    {
        return $this->belongsTo(CostoCategoria::class, 'costo_categoria_id');
    }
}
