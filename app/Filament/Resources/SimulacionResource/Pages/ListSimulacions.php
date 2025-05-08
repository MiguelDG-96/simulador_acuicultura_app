<?php

namespace App\Filament\Resources\SimulacionResource\Pages;

use App\Filament\Resources\SimulacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSimulacions extends ListRecords
{
    protected static string $resource = SimulacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
