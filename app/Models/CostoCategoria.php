<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostoCategoria extends Model
{
    //
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
    public function detalles()
    {
        return $this->hasMany(CostoDetalle::class);
    }
}
