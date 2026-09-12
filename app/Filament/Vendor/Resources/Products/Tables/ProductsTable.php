<?php

namespace App\Filament\Vendor\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // Product Image
                ImageColumn::make('images')
                    ->label('Image')
                    ->disk('public')
                    ->state(fn ($record) => $record->first_image_url ?? null)
                    ->defaultImageUrl(asset('frontend/image/amazon1.jpg'))
                    ->square()
                    ->circular(),

                // Product Name
                TextColumn::make('name')
                    ->label('Product')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->description(fn ($record) => $record->slug),

                // Category
                TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                // Price
                TextColumn::make('price')
                    ->label('Price')
                    ->money('NPR')
                    ->sortable(),

                // Discount Price
                TextColumn::make('discount_price')
                    ->label('Sale Price')
                    ->money('NPR')
                    ->sortable()
                    ->placeholder('—'),

                // Stock
                TextColumn::make('stock_qty')
                    ->label('Stock')
                    ->numeric()
                    ->sortable()
                    ->color(fn ($state) => match (true) {
                        $state <= 0 => 'danger',
                        $state <= 10 => 'warning',
                        default => 'success',
                    })
                    ->description(fn ($state) => match (true) {
                        $state <= 0 => 'Out of stock',
                        $state <= 10 => 'Low stock',
                        default => 'In stock',
                    }),

                // Product Status
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'gray',
                        'out_of_stock' => 'danger',
                        default => 'warning',
                    })
                    ->formatStateUsing(
                        fn (string $state): string => str($state)
                            ->replace('_', ' ')
                            ->title()
                    ),

                // Rating
                TextColumn::make('avg_rating')
                    ->label('Rating')
                    ->numeric(decimalPlaces: 1)
                    ->sortable()
                    ->formatStateUsing(
                        fn ($state) => $state
                            ? '★ ' . number_format($state, 1)
                            : 'No ratings'
                    ),

                // Created Date
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Updated Date
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            // Filters
            ->filters([

                SelectFilter::make('status')
                    ->options([
                        'published' => 'Published',
                        'draft' => 'Draft',
                        'out_of_stock' => 'Out of Stock',
                    ]),

                SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->label('Category'),
            ])

            // Row Actions
            ->recordActions([
                EditAction::make(),
            ])

            // Bulk Actions
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            // Table Settings
            ->defaultSort('created_at', 'desc');
    }
}

