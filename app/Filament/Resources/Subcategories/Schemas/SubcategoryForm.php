<?php

namespace App\Filament\Resources\Subcategories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubcategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Main Category')
                    ->relationship('category', 'name_en')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('name_en')
                    ->label('Name (English)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('name_ar')
                    ->label('Name (Arabic)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('sort_order')
                    ->label('Sort Order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}

