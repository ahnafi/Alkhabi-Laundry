<?php

namespace App\Filament\Admin\Resources\Orders\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Pelanggan')
                    ->preload()
                    ->searchable()
                    ->relationship('customer', 'name')
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('pickup_address_id', null);
                        $set('delivery_address_id', null);
                    })
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP']))
                    ->required(),
                Select::make('responsible_user_id')
                    ->label('Penanggung Jawab')
                    ->preload()
                    ->relationship('responsibleUser', 'name', function ($query) {
                        $query->whereHas('roles', function ($q) {
                            $q->whereIn('name', ['admin', 'superadmin']);
                        });
                    })
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP']))
                    ->required(),
                Select::make('pickup_address_id')
                    ->label('Alamat Pengambilan')
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->label} : Nama= {$record->recipient_name}; Telepon= {$record->recipient_phone}; Alamat= {$record->full_address}; catatan: {$record->notes}"
                    )
                    ->preload()
                    ->relationship('pickupAddress', 'id')
                    ->reactive()
                    ->visibleOn(["create", "edit"])
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP']))
                    ->required(),

                // Tampilan alamat pengambilan untuk mode view
                Textarea::make('pickup_address_display')
                    ->label('Alamat Pengambilan')
                    ->visibleOn(['view'])
                    ->disabled()
                    ->rows(4)
                    ->formatStateUsing(function ($record) {
                        if (!$record || !$record->pickupAddress) {
                            return 'Tidak ada alamat pengambilan';
                        }
                        $address = $record->pickupAddress;
                        return "{$address->label}\nNama: {$address->recipient_name}\nTelepon: {$address->recipient_phone}\nAlamat: {$address->full_address}\nCatatan: " . ($address->notes ?? 'Tidak ada catatan');
                    }),

                Select::make('delivery_address_id')
                    ->label('Alamat Pengantaran')
                    ->visibleOn(["create", "edit"])
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->label} : Nama= {$record->recipient_name}; Telepon= {$record->recipient_phone}; Alamat= {$record->full_address}; catatan: {$record->notes}"
                    )
                    ->preload()
                    ->relationship('deliveryAddress', 'id')
                    ->reactive()
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP']))
                    ->required(),

                // Tampilan alamat pengantaran untuk mode view
                Textarea::make('delivery_address_display')
                    ->label('Alamat Pengantaran')
                    ->visibleOn(['view'])
                    ->disabled()
                    ->rows(4)
                    ->formatStateUsing(function ($record) {
                        if (!$record || !$record->deliveryAddress) {
                            return 'Tidak ada alamat pengantaran';
                        }
                        $address = $record->deliveryAddress;
                        return "{$address->label}\nNama: {$address->recipient_name}\nTelepon: {$address->recipient_phone}\nAlamat: {$address->full_address}\nCatatan: " . ($address->notes ?? 'Tidak ada catatan');
                    }),
                Textarea::make('notes')
                    ->label('Catatan')
                    ->default(null)
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP']))
                    ->columnSpanFull(),
                ToggleButtons::make('status')
                    ->label('Status')
                    ->inline()
                    ->columnSpanFull()
                    ->options([
                        'PENDING' => 'Menunggu',
                        'CONFIRMED' => 'Dikonfirmasi',
                        'PICKED_UP' => 'Diambil',
                        'IN_PROCESS' => 'Dalam Proses',
                        'READY' => 'Siap',
                        'OUT_FOR_DELIVERY' => 'Sedang Dikirim',
                        'DELIVERED' => 'Terkirim',
                        'COMPLETED' => 'Selesai',
                        'CANCELLED' => 'Dibatalkan',
                    ])
                    ->icons([
                        'PENDING' => 'heroicon-o-clock',
                        'CONFIRMED' => 'heroicon-o-check-circle',
                        'PICKED_UP' => 'heroicon-o-truck',
                        'IN_PROCESS' => 'heroicon-o-cog-6-tooth',
                        'READY' => 'heroicon-o-shield-check',
                        'OUT_FOR_DELIVERY' => 'heroicon-o-paper-airplane',
                        'DELIVERED' => 'heroicon-o-gift',
                        'COMPLETED' => 'heroicon-o-check-badge',
                        'CANCELLED' => 'heroicon-o-x-circle',
                    ])
                    ->reactive()
                    ->default('PENDING')
                    ->required(),

                ToggleButtons::make('payment_status')
                    ->icons([
                        'UNPAID' => 'heroicon-o-clock',
                        "PAID" => "heroicon-o-check",
                        "EXPIRED" => "heroicon-o-x-circle",
                    ])
                    ->inline()
                    ->disabled()
                    ->columnSpanFull()
                    ->required()
                    ->label('Status Pembayaran')
                    ->options([
                        'UNPAID' => "Belum Dibayar",
                        'PAID' => "Sudah Dibayar",
                        'EXPIRED' => "Pembayaran Kadaluarsa",
                    ]),

                Repeater::make('orderItems')
                    ->label('Item Pesanan')
                    ->relationship()
                    ->schema([
                        Select::make('service_id')
                            ->label('Layanan')
                            ->relationship('service', 'name')
                            ->preload()
                            ->searchable()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                if ($state && is_numeric($state)) {
                                    $service = \App\Models\Service::find((int)$state);
                                    if ($service) {
                                        $qty = $get('qty') ?: 1;
                                        $subtotal = $service->price_per_unit * $qty;
                                        $set('subtotal', $subtotal);
                                    }
                                }
                            }),
                        TextInput::make('qty')
                            ->label('Jumlah')
                            ->numeric()
                            ->default(1)
                            ->minValue(0.01)
                            ->step(0.01)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                $serviceId = $get('service_id');
                                if ($serviceId && is_numeric($serviceId) && $state) {
                                    $service = \App\Models\Service::find((int)$serviceId);
                                    if ($service) {
                                        $subtotal = $service->price_per_unit * $state;
                                        $set('subtotal', $subtotal);
                                    }
                                }
                            })
                            ->required(),
                        TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->numeric()
                            ->disabled()
                            ->default(0),
                    ])
                    ->columns(3)
                    ->defaultItems(1)
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP']))
                    ->columnSpanFull(),

                TextInput::make('subtotal_amount')
                    ->label('Total Subtotal')
                    ->required()
                    ->numeric()
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP']))
                    ->default(0.0),
                TextInput::make('delivery_fee')
                    ->label('Biaya Antar')
                    ->required()
                    ->numeric()
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP']))
                    ->default(0.0),
                TextInput::make('total_amount')
                    ->label('Total Keseluruhan')
                    ->required()
                    ->numeric()
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP']))
                    ->default(0.0),

                DateTimePicker::make('completed_date')
                    ->label('Tanggal Selesai')
                    ->disabled(fn(callable $get) => !in_array($get('status'), ['PENDING', 'CONFIRMED', 'PICKED_UP'])),
            ]);
    }
}
