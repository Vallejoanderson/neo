<?php

namespace App\Modules\Purchase\Dtos;

class PurchaseDto
{
    public int $product_id;
    public int $quantity;
    public float $price;
    public string $quantity_type;
}
