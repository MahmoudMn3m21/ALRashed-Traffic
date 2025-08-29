<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
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
                    ->disk('public')
                    ->directory('products')
                    ->image()
                    ->imagePreviewHeight('250'),
                
                Textarea::make('description')
                    ->rows(3),
                
                TextInput::make('code')
                    ->maxLength(255),
                
                TextInput::make('material')
                    ->maxLength(255),
                
                TextInput::make('color')
                    ->maxLength(255),
                
                Textarea::make('features')
                    ->rows(3)
                    ->columnSpanFull(),
                
                Textarea::make('usages')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
