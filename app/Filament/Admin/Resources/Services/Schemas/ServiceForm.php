<?php

namespace App\Filament\Admin\Resources\Services\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('unit')
                    ->options([
                        'kg' => 'Kg',
                        'pcs' => 'Pcs',
                        'set' => 'Set',
                        'pasang' => 'Pasang',
                        'lembar' => 'Lembar',
                        'meter' => 'Meter',
                    ])
                    ->required(),
                TextInput::make('price_per_unit')
                    ->required()
                    ->numeric(),
            ]);
    }
}
