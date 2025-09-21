<?php

namespace App\Filament\U\Resources\Orders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                //create

                Section::make('Alamat')
                    ->description('lorem ipsum dolor sit amet')
                    ->schema([
                        Select::make('pickup_address_id')
                            ->label('Alamat Penjemputan')
                            ->relationship('pickupAddress', 'label', function ($query) {
                                return $query->where('user_id', auth()->id());
                            })
                            ->getOptionLabelFromRecordUsing(fn($record) => "{$record->label} : Nama= {$record->recipient_name}; Telepon= {$record->recipient_phone}; Alamat= {$record->full_address}; catatan: {$record->notes}"
                            )
                            ->preload()
                            ->searchable()
                            ->required(),

                        Select::make('delivery_address_id')
                            ->label('Alamat Pengiriman')
                            ->relationship('deliveryAddress', 'label', function ($query) {
                                return $query->where('user_id', auth()->id());
                            })
                            ->getOptionLabelFromRecordUsing(fn($record) => "{$record->label} : Nama= {$record->recipient_name}; Telepon= {$record->recipient_phone}; Alamat= {$record->full_address}; catatan: {$record->notes}"
                            )
                            ->searchable()
                            ->preload()
                            ->required(),
                        Textarea::make('notes')
                            ->label('Catatan')
                            ->default(null)
                            ->columnSpanFull(),
                    ])
                    ->visibleOn('create')
                    ->columnSpanFull(),

                // logic

                Wizard::make([
                    Step::make('Alamat')
                        ->schema([
                            Select::make('pickup_address_id')
                                ->disabled()
                                ->label('Alamat Penjemputan')
                                ->relationship('pickupAddress', 'label', function ($query) {
                                    return $query->where('user_id', auth()->id());
                                })
                                ->getOptionLabelFromRecordUsing(fn($record) => "{$record->label} : Nama= {$record->recipient_name}; Telepon= {$record->recipient_phone}; Alamat= {$record->full_address}; catatan: {$record->notes}"
                                )
                                ->preload()
                                ->searchable()
                                ->required(),

                            Select::make('delivery_address_id')
                                ->disabled()
                                ->label('Alamat Pengiriman')
                                ->relationship('deliveryAddress', 'label', function ($query) {
                                    return $query->where('user_id', auth()->id());
                                })
                                ->getOptionLabelFromRecordUsing(fn($record) => "{$record->label} : Nama= {$record->recipient_name}; Telepon= {$record->recipient_phone}; Alamat= {$record->full_address}; catatan: {$record->notes}"
                                )
                                ->searchable()
                                ->preload()
                                ->required(),

                            Textarea::make('notes')
                                ->disabled()
                                ->label('Catatan')
                                ->default(null)
                                ->columnSpanFull(),
                        ]),
                    Step::make('Dalam Pengerjaan')
                        ->schema([

                            Select::make('status')
                                ->label('Status Pesanan')
                                ->options([
                                    'PENDING' => 'Menunggu',
                                    'CONFIRMED' => 'Dikonfirmasi',
                                    'PICKED_UP' => 'Dijemput',
                                    'IN_PROCESS' => 'Diproses',
                                    'READY' => 'Siap',
                                    'OUT_FOR_DELIVERY' => 'Dalam Pengiriman',
                                    'DELIVERED' => 'Terkirim',
                                    'COMPLETED' => 'Selesai',
                                    'CANCELLED' => 'Dibatalkan',
                                ])
                                ->disabled()
                                ->default('PENDING')
                                ->required(),
                            Select::make('payment_status')
                                ->disabled()
                                ->options([
                                    'UNPAID' => 'Unpaid',
                                    'PAID' => 'Paid',
                                    'EXPIRED' => 'Expired',
                                ])
                                ->default('UNPAID')
                                ->required(),

                            TextInput::make('total_weight')
                                ->disabled()
                                ->numeric()
                                ->default(null),
                            TextInput::make('subtotal_amount')
                                ->disabled()
                                ->required()
                                ->numeric()
                                ->default(0.0),
                            TextInput::make('delivery_fee')
                                ->disabled()
                                ->required()
                                ->numeric()
                                ->default(0.0),
                            TextInput::make('total_amount')
                                ->disabled()
                                ->required()
                                ->numeric()
                                ->default(0.0),

                            Repeater::make('orderItems')
                                ->label('Paket Laundry')
                                ->schema([

                                    Select::make('order_id')


//                                    'order_id',
//                                    'product_id',
//                                    'service_id',
//                                    'quantity',
//                                    'weight',
//                                    'price',
//                                    'subtotal',
                                ])
//                                ->disabled()
                                ->columnSpanFull()
                                ->columns(2),
                        ])
                        ->columns(2),
                    Step::make('Feedback')
                        ->schema([
                            // ...
                        ]),
                ])
                    ->startOnStep(2)
                    ->visibleOn(['edit', 'update', 'view'])
                    ->columnSpanFull(),

//                Select::make('payment_status')
//                    ->options([
//                        'UNPAID' => 'Unpaid',
//                        'PAID' => 'Paid',
//                        'EXPIRED' => 'Expired',
//                    ])
//                    ->default('UNPAID')
//                    ->required(),
//                TextInput::make('total_weight')
//                    ->numeric()
//                    ->default(null),
//                TextInput::make('subtotal_amount')
//                    ->required()
//                    ->numeric()
//                    ->default(0.0),
//                TextInput::make('delivery_fee')
//                    ->required()
//                    ->numeric()
//                    ->default(0.0),
//                TextInput::make('total_amount')
//                    ->required()
//                    ->numeric()
//                    ->default(0.0),
//                Textarea::make('notes')
//                    ->default(null)
//                    ->columnSpanFull(),
//                DateTimePicker::make('completed_date'),


            ]);
    }
}
