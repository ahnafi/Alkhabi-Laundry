<?php

namespace App\Filament\U\Resources\Orders;

use App\Filament\U\Resources\Orders\Pages\CreateOrder;
use App\Filament\U\Resources\Orders\Pages\EditOrder;
use App\Filament\U\Resources\Orders\Pages\ListOrders;
use App\Filament\U\Resources\Orders\Schemas\OrderForm;
use App\Filament\U\Resources\Orders\Tables\OrdersTable;
use App\Models\Order;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationLabel = "Pesanan";
    protected static ?string $modelLabel = "Pesanan";
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;
    protected static string|UnitEnum|null $navigationGroup = "Manajemen Pemesanan";

    protected static ?string $recordTitleAttribute = 'code';

    public static function form(Schema $schema): Schema
    {
        return OrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrdersTable::configure($table);
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
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
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
