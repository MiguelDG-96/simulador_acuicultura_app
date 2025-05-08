<?php

namespace App\Filament\Resources\SimulacionResource\Pages;

use App\Filament\Resources\SimulacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSimulacion extends EditRecord
{
    protected static string $resource = SimulacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $especie = \App\Models\Especie::find($data['especie_id']);

        $data['produccion_total_kg'] = $data['poblacion_inicial'] * $especie->peso_final_kg * 0.9;

        $data['ingresos'] = $data['produccion_total_kg'] * $data['precio_venta_kg'];

        $data['costo_operativo_total'] = $data['costo_operativo_efectivo'] + $data['depreciacion'] + $data['amortizacion'];

        $data['resultado_operativo_total'] = $data['ingresos'] - $data['costo_operativo_total'];

        $data['costo_total'] = $data['costo_operativo_total'] + $data['impuestos'];

        $data['utilidad'] = $data['ingresos'] - $data['costo_total'];

        $data['rentabilidad'] = $data['costo_total'] > 0
            ? ($data['utilidad'] / $data['costo_total']) * 100
            : 0;

        $data['beneficio_bruto'] = $data['ingresos'] - $data['costo_operativo_efectivo'];

        return $data;
    }
}
