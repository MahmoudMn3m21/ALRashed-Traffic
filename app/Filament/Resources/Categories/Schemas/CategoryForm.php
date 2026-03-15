<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_en')
                    ->label('Name (English)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('name_ar')
                    ->label('Name (Arabic)')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->disk('categories_public')
                    ->directory('')
                    ->visibility('public')
                    ->imagePreviewHeight('200')
                    ->nullable(),
            ]);
    }
}
