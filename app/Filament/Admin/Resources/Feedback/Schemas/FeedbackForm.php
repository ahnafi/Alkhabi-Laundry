<?php

namespace App\Filament\Admin\Resources\Feedback\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FeedbackForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('order_id')
                    ->relationship('order', 'id')
                    ->required(),
                TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('comment')
                    ->default(null),
            ]);
    }
}
