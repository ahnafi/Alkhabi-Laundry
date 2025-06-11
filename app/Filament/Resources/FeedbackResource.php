<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbackResource\Pages;
use App\Filament\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Feedback Pelanggan';
    protected static ?string $navigationGroup = 'Manajemen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pelanggan')
                    ->label('Nama Pelanggan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('puas_laundry')
                    ->label('Kepuasan terhadap Layanan Laundry')
                    ->options([
                        'Sangat Puas' => 'Sangat Puas',
                        'Puas' => 'Puas',
                        'Cukup' => 'Cukup',
                        'Kurang' => 'Kurang',
                        'Tidak Puas' => 'Tidak Puas',
                    ])
                    ->required(),

                Forms\Components\Select::make('puas_harga')
                    ->label('Kepuasan terhadap Harga')
                    ->options([
                        'Sangat Puas' => 'Sangat Puas',
                        'Puas' => 'Puas',
                        'Cukup' => 'Cukup',
                        'Kurang' => 'Kurang',
                        'Tidak Puas' => 'Tidak Puas',
                    ])
                    ->required(),

                Forms\Components\Textarea::make('kritik_saran')
                    ->label('Kritik & Saran')
                    ->rows(4)
                    ->maxLength(1000),
    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pelanggan')->label('Nama'),
                Tables\Columns\TextColumn::make('puas_laundry')->label('Puas Laundry'),
                Tables\Columns\TextColumn::make('puas_harga')->label('Puas Harga'),
                Tables\Columns\TextColumn::make('kritik_saran')->label('Kritik & Saran')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y, H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListFeedback::route('/'),
        ];
    }
}
