<?php

namespace App\Filament\Resources\CostoCategoriaResource\Pages;

use App\Filament\Resources\CostoCategoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCostoCategorias extends ListRecords
{
    protected static string $resource = CostoCategoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
