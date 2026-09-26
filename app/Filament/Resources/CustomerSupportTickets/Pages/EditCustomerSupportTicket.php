<?php

namespace App\Filament\Resources\CustomerSupportTickets\Pages;

use App\Filament\Resources\CustomerSupportTickets\CustomerSupportTicketResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerSupportTicket extends EditRecord
{
    protected static string $resource = CustomerSupportTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
