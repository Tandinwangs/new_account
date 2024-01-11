<?php

namespace App\Filament\Resources\UserAccountDetailResource\Pages;

use App\Filament\Resources\UserAccountDetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserAccountDetail extends EditRecord
{
    protected static string $resource = UserAccountDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
