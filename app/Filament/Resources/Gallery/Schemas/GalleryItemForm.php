<?php

namespace App\Filament\Resources\Gallery\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GalleryItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->disk('gallery_public')
                    ->directory('')
                    ->visibility('public')
                    ->imagePreviewHeight('200')
                    ->required(),

                TextInput::make('title_en')
                    ->label('Title (English)')
                    ->maxLength(255),

                TextInput::make('title_ar')
                    ->label('Title (Arabic)')
                    ->maxLength(255),

                TextInput::make('sort_order')
                    ->label('Sort order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
