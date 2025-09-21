<?php

namespace App\Filament\U\Resources\Feedback\Pages;

use App\Filament\U\Resources\Feedback\FeedbackResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFeedback extends CreateRecord
{
    protected static string $resource = FeedbackResource::class;
}
