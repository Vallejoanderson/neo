<?php

namespace App\Modules\Purchase\Domain;

use App\Modules\Purchase\Dtos\PurchaseDto;

interface PurchaseRepositoryInterface {
    public function save(PurchaseDto $request);
}
