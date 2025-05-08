<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    //
    protected $fillable = [
        'nombre',
        'peso_final_kg',
        'precio_venta_kg',
        'ca',
        'costo_alimento',
    ];
    public function simulaciones()
    {
        return $this->hasMany(Simulacion::class);
    }
}
