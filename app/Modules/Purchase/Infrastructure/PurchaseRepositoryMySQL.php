<?php

namespace App\Modules\Purchase\Infrastructure;

use App\Modules\Purchase\Dtos\PurchaseDto;
use App\Modules\Purchase\Domain\PurchaseItem;
use App\Modules\Purchase\Domain\PurchaseRepositoryInterface;

class PurchaseRepositoryMySQL implements PurchaseRepositoryInterface
{
    public function save(PurchaseDto $request)
    {
        try {
            return PurchaseItem::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'quantity_type' => $request->quantity_type,
                'price' => $request->price,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
