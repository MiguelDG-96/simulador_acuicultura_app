<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SimulacionResource\Pages;
use App\Filament\Resources\SimulacionResource\RelationManagers;
use App\Models\Especie;//estoy usando el modelo Especie
use App\Models\Simulacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SimulacionResource extends Resource
{
    protected static ?string $model = Simulacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('especie_id')
                ->label('Especie')
                ->relationship('especie', 'nombre')
                ->required(),

            Select::make('tipo_crianza')
                ->label('Tipo de Crianza')
                ->options([
                    'intensiva' => 'Intensiva',
                    'extensiva' => 'Extensiva',
                ])
                ->required(),

            TextInput::make('poblacion_inicial')
                ->label('Población Inicial')
                ->numeric()
                ->minValue(0) // No permite negativos
                ->minValue(1)
                ->required(),

            TextInput::make('precio_venta_kg')
                ->label('Precio de Venta por kg (S/.)')
                ->numeric()
                ->minValue(0) // No permite negativos
                ->step(0.01)
                ->required(),

                TextInput::make('costo_operativo_efectivo')
                ->label('Costo Operativo Efectivo')
                ->numeric()
                ->step(0.01)
                ->minValue(0),

            TextInput::make('depreciacion')
                ->label('Depreciación')
                ->numeric()
                ->step(0.01)
                ->minValue(0),

            TextInput::make('amortizacion')
                ->label('Amortización')
                ->numeric()
                ->step(0.01)
                ->minValue(0),

            TextInput::make('impuestos')
                ->label('Impuestos')
                ->numeric()
                ->step(0.01)
                ->minValue(0),
            
            DatePicker::make('fecha_inicio')
                ->label('Fecha de Inicio')
                ->required(),

            DatePicker::make('fecha_fin')
                ->label('Fecha de Fin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('especie.nombre')
                ->label('Especie')
                ->sortable()
                ->searchable(),

                BadgeColumn::make('tipo_crianza')
                    ->colors([
                        'primary' => 'intensiva',
                        'warning' => 'extensiva',
                    ])
                    ->label('Tipo de Crianza'),

                TextColumn::make('poblacion_inicial')
                    ->numeric()
                    ->label('Población'),

                TextColumn::make('produccion_total_kg')
                    ->numeric(decimalPlaces: 2)
                    ->label('Producción (kg)'),

                TextColumn::make('ingresos')
                    ->money('PEN')
                    ->label('Ingresos'),

                TextColumn::make('utilidad')
                    ->money('PEN')
                    ->label('Utilidad'),

                TextColumn::make('rentabilidad')
                    ->label('Rentabilidad (%)'),

                TextColumn::make('fecha_inicio')
                    ->date()
                    ->label('Inicio'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSimulacions::route('/'),
            'create' => Pages\CreateSimulacion::route('/create'),
            'edit' => Pages\EditSimulacion::route('/{record}/edit'),
        ];
    }
}
