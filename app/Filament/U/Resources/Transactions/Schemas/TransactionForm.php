<?php

namespace App\Filament\U\Resources\Transactions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('order_id')
                    ->relationship('order', 'id')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('gateway_transaction_id')
                    ->default(null),
                TextInput::make('payment_method')
                    ->required(),
                TextInput::make('payment_channel')
                    ->default(null),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('currency')
                    ->required()
                    ->default('IDR'),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'success' => 'Success',
            'failed' => 'Failed',
            'expired' => 'Expired',
            'refunded' => 'Refunded',
        ])
                    ->default('pending')
                    ->required(),
                TextInput::make('signature')
                    ->default(null),
                Textarea::make('callback_response')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('ip_address')
                    ->default(null),
                Textarea::make('user_agent')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
