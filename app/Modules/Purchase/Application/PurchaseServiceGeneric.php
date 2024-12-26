<?php

namespace App\Modules\Purchase\Application;

use Illuminate\Support\Facades\App;
use App\Modules\Purchase\Dtos\PurchaseDto;
use App\Modules\Purchase\Domain\PurchaseServiceInterface;
use App\Modules\Purchase\Domain\PurchaseRepositoryInterface;

class PurchaseServiceGeneric implements PurchaseServiceInterface
{
    private PurchaseRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = App::make(PurchaseRepositoryInterface::class);
    }

    public function save(PurchaseDto $request) {
        $response = $this->repository->save($request);
        return response()->json([
            'data' => $response,
            'message' => 'Purchase created successfully',
            'status' => 201
        ]);
    }
}
