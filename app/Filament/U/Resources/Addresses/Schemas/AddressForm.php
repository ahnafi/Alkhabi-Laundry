<?php

namespace App\Filament\U\Resources\Addresses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('recipient_phone')
                    ->tel()
                    ->required(),
                TextInput::make('recipient_name')
                    ->required(),
                Textarea::make('full_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('label')
                    ->required(),
                TextInput::make('notes'),
            ]);
    }
}
