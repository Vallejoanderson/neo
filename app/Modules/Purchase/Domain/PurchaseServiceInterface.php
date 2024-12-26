<?php

namespace App\Modules\Purchase\Domain;

use App\Modules\Purchase\Dtos\PurchaseDto;

interface PurchaseServiceInterface {
    public function save(PurchaseDto $request);
}
