<?php

namespace App\Filament\U\Resources\Orders\Schemas;

use App\Models\Order;
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
                    ->description('Silakan pilih alamat penjemputan dan pengiriman untuk pesanan Anda')
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
                                ->label('Status Pembayaran')
                                ->disabled()
                                ->options([
                                    'UNPAID' => 'Belum dibayar',
                                    'PAID' => 'Terbayar',
                                    'EXPIRED' => 'Kadaluarsa',
                                ])
                                ->default('UNPAID')
                                ->required(),

                            Repeater::make('orderItems')
                                ->label('Item Pesanan')
                                ->collapsible(true)
                                ->deletable(false)
                                ->addable(false)
                                ->relationship()
                                ->grid(2)
                                ->schema([
                                    Select::make('service_id')
                                        ->label('Layanan')
                                        ->relationship('service', 'name')
                                        ->preload()
                                        ->searchable()
                                        ->required()
                                        ->disabled()
                                        ->columnSpan(2),

                                    TextInput::make('qty')
                                        ->label('Jumlah')
                                        ->numeric()
                                        ->step(0.01)
                                        ->minValue(0)
                                        ->required()
                                        ->disabled()
                                        ->columnSpan(2),

                                    TextInput::make('harga_satuan')
                                        ->label('Harga per Satuan')
                                        ->disabled()
                                        ->prefix('Rp')
                                        ->formatStateUsing(function ($record) {
                                            return number_format($record?->service?->price_per_unit ?? 0, 0, ',', '.');
                                        })
                                        ->columnSpan(2),

                                    TextInput::make('subtotal')
                                        ->label('Subtotal')
                                        ->numeric()
                                        ->step(0.01)
                                        ->prefix('Rp')
                                        ->minValue(0)
                                        ->required()
                                        ->disabled()
                                        ->columnSpan(2),
                                ])
                                ->columnSpanFull()
                                ->columns(4),

                            TextInput::make('subtotal_amount')
                                ->label('Subtotal Pesanan')
                                ->prefix('Rp')
                                ->disabled()
                                ->required()
                                ->numeric()
                                ->default(0.0),
                            TextInput::make('delivery_fee')
                                ->label('Biaya Pengiriman')
                                ->prefix('Rp')
                                ->disabled()
                                ->required()
                                ->numeric()
                                ->default(0.0),
                            TextInput::make('total_amount')
                                ->label('Total Pembayaran')
                                ->prefix('Rp')
                                ->disabled()
                                ->required()
                                ->numeric()
                                ->default(0.0),

                        ])
                        ->columns(2),
                    Step::make('Feedback')
                        ->schema([
                            // ...
                        ]),
                ])
                    ->startOnStep(function (Order $record) {
                        if ($record->status == "PENDING") return 1;
                        else if ($record->status == "COMPLETED") return 3;
                        else return 2;
                    })
                    ->visibleOn(['edit', 'update', 'view'])
                    ->columnSpanFull(),
            ]);
    }
}
