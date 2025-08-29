<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->directory('clients')
                    ->visibility('public')
                    ->imagePreviewHeight('100')
                    ->maxSize(2048)
                    ->nullable(),
                TextInput::make('website')
                    ->url()
                    ->nullable(),
            ]);
    }
}
