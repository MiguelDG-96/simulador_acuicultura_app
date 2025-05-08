<?php

namespace App\Filament\Resources\CostoDetalleResource\Pages;

use App\Filament\Resources\CostoDetalleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCostoDetalle extends EditRecord
{
    protected static string $resource = CostoDetalleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
