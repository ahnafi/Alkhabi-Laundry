<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesanResource\Pages;
use App\Models\Pesan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;

class PesanResource extends Resource
{
    protected static ?string $model = Pesan::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Manajemen Pesanan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pelanggan')
                    ->description('Data ini diisi oleh pelanggan dan tidak dapat diubah.')
                    ->schema([
                        TextInput::make('nama_pelanggan')->readOnly(),
                        TextInput::make('no_hp')->readOnly(),
                        Textarea::make('alamat')->columnSpanFull()->readOnly(),
                        TextInput::make('jenis_layanan')->readOnly(),
                        TextInput::make('paket')->readOnly(),
                    ])->columns(2),

                Section::make('Konfirmasi oleh Admin')
                    ->description('Isi detail ini untuk menghasilkan tagihan.')
                    ->schema([
                        TextInput::make('berat')
                            ->label('Berat (kg) / Item')
                            ->numeric()
                            ->required()
                            ->suffix('kg / item'),
                        TextInput::make('total_harga')
                            ->label('Total Harga')
                            ->numeric()
                            ->required()
                            ->prefix('Rp'),
                
                        Select::make('status')
                            ->options([
                                'Menunggu Konfirmasi' => 'Menunggu Konfirmasi',
                                'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                                'Diproses' => 'Diproses',
                                'Lunas' => 'Lunas (Pembayaran Diterima)',
                                'Selesai' => 'Selesai (Sudah Diambil)',
                                'Dibatalkan' => 'Dibatalkan',
                            ])
                            ->required(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('nama_pelanggan')->searchable()->sortable(),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'Menunggu Konfirmasi',
                        'primary' => 'Menunggu Pembayaran',
                        'success' => fn ($state) => in_array($state, ['Lunas', 'Selesai']),
                        'danger' => 'Dibatalkan',
                    ])->sortable(),
                TextColumn::make('total_harga')
                    ->money('IDR')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Menunggu Konfirmasi' => 'Menunggu Konfirmasi',
                        'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                        'Lunas' => 'Lunas',
                        'Selesai' => 'Selesai',
                    ])
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
            'index' => Pages\ListPesans::route('/'),
            'create' => Pages\CreatePesan::route('/create'),
            'edit' => Pages\EditPesan::route('/{record}/edit'),
        ];
    }    
}
