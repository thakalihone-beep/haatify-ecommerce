<?php

namespace App\Filament\Resources\CustomerSupportTickets\Pages;

use App\Filament\Resources\CustomerSupportTickets\CustomerSupportTicketResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerSupportTicket extends CreateRecord
{
    protected static string $resource = CustomerSupportTicketResource::class;
}
