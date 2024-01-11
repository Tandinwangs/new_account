<?php

namespace App\Filament\Resources\UserAccountDetailResource\Pages;

use App\Filament\Resources\UserAccountDetailResource;
use Filament\Pages\Actions;
use App\Models\Village;
use Filament\Resources\Pages\CreateRecord;

class CreateUserAccountDetail extends CreateRecord
{
    protected static string $resource = UserAccountDetailResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array {
        $dzongcode = $data['dzongcode'];
        $data['dzongcode'] = str_pad($dzongcode, 2, '0', STR_PAD_LEFT);

        $gewocode = $data['gewocode'];
        $data['gewocode'] = str_pad($gewocode, 3, '0', STR_PAD_LEFT);
        
        $villcode = $data['villcode'];
        $villcode = Village::get()->where('id', $villcode)->first();
        $data['villcode'] = $villcode->villcode;
        return $data;
    }
  
}
