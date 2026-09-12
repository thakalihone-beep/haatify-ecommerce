<?php

namespace App\Filament\Vendor\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;

use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\RichEditor;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->label('Product Name')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                RichEditor::make('description')
                    ->label('Description')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'h2',
                        'h3',
                        'bulletList',
                        'orderedList',
                        'blockquote',
                        'link',
                        'undo',
                        'redo',
                    ])
                    ->columnSpanFull(),
                FileUpload::make('images')
                    ->image()
                    ->disk('public')
                    ->directory('products')
                    ->multiple()
                    ->default(null)
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
                    ->prefix('$')
                    ->suffix('%'),
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
                    ->helperText('Rating must be between 0 and 5.')
                    ->default(0.0),
            ]);
    }
}
