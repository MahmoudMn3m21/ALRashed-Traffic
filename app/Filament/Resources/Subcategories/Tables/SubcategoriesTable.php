<?php

namespace App\Filament\Resources\Subcategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SubcategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name_en')
                    ->label('Main Category')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name_en')
                    ->label('Name (English)')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name_ar')
                    ->label('Name (Arabic)')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),

                TextColumn::make('products_count')
                    ->label('Products')
                    ->counts('products')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

