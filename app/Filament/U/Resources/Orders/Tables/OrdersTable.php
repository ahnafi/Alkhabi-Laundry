<?php

namespace App\Filament\U\Resources\Orders\Tables;

use App\Models\Order;
use App\Services\FeedbackService;
use App\Services\OrderService;
use App\Services\TransactionService;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn($query) => $query->where('user_id', auth()->id()))
            ->columns([
                TextColumn::make('code')
                    ->searchable(),
//                TextColumn::make('responsibleUser.name')
//                    ->searchable(),
                TextColumn::make('pickupAddress.label')
                    ->searchable(),
                TextColumn::make('deliveryAddress.label')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('payment_status')
//                    ->visible(fn($record) => $record->status == 'CONFIRMED'),
                    ->badge(),
                TextColumn::make('subtotal_amount')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('delivery_fee')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('completed_date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                Action::make("Bayar paket")
                    ->visible(fn(Order $record) => $record->payment_status == 'UNPAID' && $record->status == 'PICKED_UP')
                    ->action(fn(array $data, Order $record) => resolve(TransactionService::class)->createTransaction($record, $data))
                    ->color("info")
                    ->icon(Heroicon::CreditCard),
                Action::make("Konfirmasi Laundry")
                    ->visible(fn(Order $order) => $order->status == "DELIVERED")
                    ->action(fn(array $data, Order $record) => resolve(OrderService::class)->userConfirmed($record))
                    ->color("success")
                    ->icon(Heroicon::CheckCircle),
                Action::make("Ulasan")
                    ->visible(fn(Order $order) => $order->status == "COMPLETED")
                    ->action(fn(array $data) => resolve(FeedbackService::class)->create($data))
                    ->color("warning")
                    ->icon(Heroicon::ChatBubbleLeft),

            ]);
    }
}
