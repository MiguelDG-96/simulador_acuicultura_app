<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simulacion extends Model
{
    //
    protected $fillable = [
        'user_id',
        'especie_id',
        'tipo_crianza',
        'poblacion_inicial',
        'produccion_total_kg',
        'precio_venta_kg',
        'ingresos',
        'costo_operativo_efectivo',
        'beneficio_bruto',
        'depreciacion',
        'amortizacion',
        'costo_operativo_total',
        'resultado_operativo_total',
        'impuestos',
        'costo_total',
        'utilidad',
        'rentabilidad',
        'fecha_inicio',
        'fecha_fin',
    ];
    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function costos()
    {
        return $this->hasMany(CostoDetalle::class);
    }
}
