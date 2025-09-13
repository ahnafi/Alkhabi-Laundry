<?php

namespace App\Filament\Admin\Resources\Orders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->preload()
                    ->searchable()
                    ->relationship('customer', 'name')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('pickup_address_id', null);
                        $set('delivery_address_id', null);
                    })
                    ->required(),
                Select::make('responsible_user_id')
                    ->preload()
                    ->relationship('responsibleUser', 'name', function ($query) {
                        $query->whereHas('roles', function ($q) {
                            $q->whereIn('name', ['admin', 'superadmin']);
                        });
                    })
                    ->required(),
                Select::make('pickup_address_id')
                    ->preload()
                    ->relationship('pickupAddress', 'id')
                    ->reactive()
                    ->required(),
                Select::make('delivery_address_id')
                    ->preload()
                    ->relationship('deliveryAddress', 'id')
                    ->reactive()
                    ->required(),
                Select::make('status')
                    ->options([
                        'PENDING' => 'Pending',
                        'CONFIRMED' => 'Confirmed',
                        'PICKED_UP' => 'Picked up',
                        'IN_PROCESS' => 'In process',
                        'READY' => 'Ready',
                        'OUT_FOR_DELIVERY' => 'Out for delivery',
                        'DELIVERED' => 'Delivered',
                        'COMPLETED' => 'Completed',
                        'CANCELLED' => 'Cancelled',
                    ])
                    ->default('PENDING')
                    ->required(),
                Select::make('payment_status')
                    ->options([
                        'UNPAID' => 'Unpaid',
                        'PAID' => 'Paid',
                        'EXPIRED' => 'Expired',
                    ])
                    ->default('UNPAID')
                    ->required(),
                TextInput::make('total_weight')
                    ->numeric()
                    ->default(null),
                TextInput::make('subtotal_amount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('delivery_fee')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('completed_date'),
            ]);
    }
}
