<?php

namespace App\Filament\Resources\SimulacionResource\Pages;

use App\Filament\Resources\SimulacionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSimulacion extends CreateRecord
{
    protected static string $resource = SimulacionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
}
