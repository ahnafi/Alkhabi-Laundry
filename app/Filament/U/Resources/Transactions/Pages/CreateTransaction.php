<?php

namespace App\Filament\U\Resources\Transactions\Pages;

use App\Filament\U\Resources\Transactions\TransactionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;
}
