<?php

namespace App\Filament\Resources\ShippingAddresses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ShippingAddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('address_line_1')
                    ->required(),
                TextInput::make('address_line_2')
                    ->default(null),
                TextInput::make('city')
                    ->required(),
                TextInput::make('state')
                    ->default(null),
                TextInput::make('postal_code')
                    ->default(null),
                TextInput::make('country')
                    ->required()
                    ->default('Nepal'),
                Toggle::make('is_default')
                    ->required(),
            ]);
    }
}
