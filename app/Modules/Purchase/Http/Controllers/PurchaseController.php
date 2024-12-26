<?php

namespace App\Modules\Purchase\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Modules\Purchase\Mappers\SavePurchaseMapper;
use App\Modules\Purchase\Domain\PurchaseServiceInterface;

class PurchaseController extends Controller
{
    private PurchaseServiceInterface $purchaseService;

    public function __construct()
    {
        $this->purchaseService = App::make(PurchaseServiceInterface::class);
    }

    public function save(Request $request)
    {
        $purchase = new SavePurchaseMapper();
        $purchase = $purchase->map($request);

        return $this->purchaseService->save($purchase);
    }
}
