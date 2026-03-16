<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Subcategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name_en')
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->live(),

                Select::make('subcategory_id')
                    ->label('Subcategory')
                    ->options(fn (callable $get) => Subcategory::query()
                        ->when($get('category_id'), fn ($q, $categoryId) => $q->where('category_id', $categoryId))
                        ->orderBy('sort_order')
                        ->orderBy('name_en')
                        ->pluck('name_en', 'id')
                        ->all())
                    ->searchable()
                    ->preload()
                    ->required()
                    ->disabled(fn (callable $get) => blank($get('category_id')))
                    ->dehydrated()
                    ->live()
                    ->afterStateUpdated(function (callable $set, callable $get) {
                        if (blank($get('category_id'))) {
                            $set('subcategory_id', null);
                        }
                    }),

                TextInput::make('name_en')
                    ->label('Name (English)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('name_ar')
                    ->label('Name (Arabic)')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    ->image()
                    ->disk('products_public')
                    ->directory('') // already inside projects folder
                    ->visibility('public')
                    ->required()
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
