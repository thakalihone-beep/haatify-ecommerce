<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('order_id')
                    ->relationship('order', 'id')
                    ->required(),
                Select::make('payment_method')
                    ->options(['cod' => 'Cod', 'esewa' => 'Esewa', 'khalti' => 'Khalti', 'bank_transfer' => 'Bank transfer'])
                    ->required(),
                TextInput::make('transaction_id')
                    ->default(null),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options([
            'pending' => 'Pending',
            'processing' => 'Processing',
            'completed' => 'Completed',
            'failed' => 'Failed',
            'refunded' => 'Refunded',
        ])
                    ->default('pending')
                    ->required(),
                Textarea::make('payment_details')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('paid_at'),
            ]);
    }
}
