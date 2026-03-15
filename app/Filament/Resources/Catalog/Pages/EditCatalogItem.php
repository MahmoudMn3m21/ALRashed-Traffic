<?php

namespace App\Filament\Resources\Catalog\Pages;

use App\Filament\Resources\Catalog\CatalogItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCatalogItem extends EditRecord
{
    protected static string $resource = CatalogItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
