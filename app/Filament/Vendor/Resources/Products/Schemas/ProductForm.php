<?php

namespace App\Filament\Vendor\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('vendor_id')
                    ->required()
                    ->numeric(),
                TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('images')
                    ->default(null)
                    ->multiple()
                    ->columnSpanFull(),
                TagsInput::make('tags')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('discount_price')
                    ->numeric()
                    ->default(null)
                    ->prefix('$'),
                TextInput::make('stock_qty')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('status')
                    ->options([
            'draft' => 'Draft',
            'active' => 'Active',
            'inactive' => 'Inactive',
            'out_of_stock' => 'Out of stock',
        ])
                    ->default('draft')
                    ->required(),
                TextInput::make('avg_rating')
                    ->required()
                    ->numeric()
                    ->default(0.0),
            ]);
    }
}
