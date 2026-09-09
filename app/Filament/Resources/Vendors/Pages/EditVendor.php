<?php

namespace App\Filament\Resources\Vendors\Pages;

use App\Filament\Resources\Vendors\VendorResource;
use App\Mail\VendorApprovalNotification;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;
use Override;

class EditVendor extends EditRecord
{
    protected static string $resource = VendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    #[Override]
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $vendor = $this->record;
        if ($vendor->password == null && $data["status"] == "approved") {
            $password = rand(100000, 999999);
            $data['password'] = $password;
            Mail::to($vendor->email)->send(new VendorApprovalNotification($vendor, $password));
        }
        return parent::mutateFormDataBeforeSave($data);
    }
}
