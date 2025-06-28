<?php

namespace App\Filament\Resources\FichierResource\Pages;

use App\Filament\Resources\FichierResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateFichier extends CreateRecord
{
    protected static string $resource = FichierResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id(); // ou auth()->id()
        return $data;
    }
}
