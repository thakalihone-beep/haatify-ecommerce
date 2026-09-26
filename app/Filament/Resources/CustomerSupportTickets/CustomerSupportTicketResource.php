<?php

namespace App\Filament\Resources\CustomerSupportTickets;

use App\Filament\Resources\CustomerSupportTickets\Pages\CreateCustomerSupportTicket;
use App\Filament\Resources\CustomerSupportTickets\Pages\EditCustomerSupportTicket;
use App\Filament\Resources\CustomerSupportTickets\Pages\ListCustomerSupportTickets;
use App\Filament\Resources\CustomerSupportTickets\Schemas\CustomerSupportTicketForm;
use App\Filament\Resources\CustomerSupportTickets\Tables\CustomerSupportTicketsTable;
use App\Models\CustomerSupportTicket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CustomerSupportTicketResource extends Resource
{
    protected static ?string $model = CustomerSupportTicket::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CustomerSupportTicketForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerSupportTicketsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomerSupportTickets::route('/'),
            'create' => CreateCustomerSupportTicket::route('/create'),
            'edit' => EditCustomerSupportTicket::route('/{record}/edit'),
        ];
    }
}
