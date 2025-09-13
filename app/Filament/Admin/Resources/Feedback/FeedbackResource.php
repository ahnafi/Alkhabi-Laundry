<?php

namespace App\Filament\Admin\Resources\Feedback;

use App\Filament\Admin\Resources\Feedback\Pages\CreateFeedback;
use App\Filament\Admin\Resources\Feedback\Pages\EditFeedback;
use App\Filament\Admin\Resources\Feedback\Pages\ListFeedback;
use App\Filament\Admin\Resources\Feedback\Pages\ViewFeedback;
use App\Filament\Admin\Resources\Feedback\Schemas\FeedbackForm;
use App\Filament\Admin\Resources\Feedback\Schemas\FeedbackInfolist;
use App\Filament\Admin\Resources\Feedback\Tables\FeedbackTable;
use App\Models\Feedback;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;
    protected static ?string $navigationLabel = "Ulasan";
    protected static ?string $modelLabel = "Ulasan";
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHandThumbUp;
    protected static string | UnitEnum | null $navigationGroup = "Manajemen Pengguna";


    public static function form(Schema $schema): Schema
    {
        return FeedbackForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FeedbackInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeedbackTable::configure($table);
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
            'index' => ListFeedback::route('/'),
            'create' => CreateFeedback::route('/create'),
            'view' => ViewFeedback::route('/{record}'),
            'edit' => EditFeedback::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
