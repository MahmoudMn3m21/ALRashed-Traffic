<?php

namespace App\Filament\Resources\Catalog\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CatalogItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title_en')
                    ->label('Title (English)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('title_ar')
                    ->label('Title (Arabic)')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('file')
                    ->label('PDF File')
                    ->disk('catalog_public')
                    ->directory('')
                    ->visibility('public')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),

                TextInput::make('sort_order')
                    ->label('Sort order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
