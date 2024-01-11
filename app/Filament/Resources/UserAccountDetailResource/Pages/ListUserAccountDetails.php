<?php

namespace App\Filament\Resources\UserAccountDetailResource\Pages;

use App\Filament\Resources\UserAccountDetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserAccountDetails extends ListRecords
{
    protected static string $resource = UserAccountDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
