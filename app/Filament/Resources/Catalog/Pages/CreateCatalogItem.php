<?php

namespace App\Filament\Resources\Catalog\Pages;

use App\Filament\Resources\Catalog\CatalogItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCatalogItem extends CreateRecord
{
    protected static string $resource = CatalogItemResource::class;
}
