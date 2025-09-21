<?php

namespace App\Filament\U\Resources\Addresses\Pages;

use App\Filament\U\Resources\Addresses\AddressResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAddress extends CreateRecord
{
    protected static string $resource = AddressResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return parent::mutateFormDataBeforeCreate($data);
    }
}
