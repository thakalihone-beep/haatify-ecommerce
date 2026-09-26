<?php

namespace App\Filament\Resources\CustomerSupportTickets\Pages;

use App\Filament\Resources\CustomerSupportTickets\CustomerSupportTicketResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerSupportTickets extends ListRecords
{
    protected static string $resource = CustomerSupportTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
