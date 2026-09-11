<?php

namespace App\Filament\Vendor\Resources\Products\Pages;

use App\Filament\Vendor\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Override;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    #[Override]
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['vendor_id'] = Auth::guard(name: 'vendor')->user()->id;
        return parent::mutateFormDataBeforeCreate($data);
    }
}
