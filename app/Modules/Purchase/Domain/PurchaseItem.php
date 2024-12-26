<?php

namespace App\Modules\Purchase\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Product\Domain\Product;

class PurchaseItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id', 'quantity', 'price', 'quantity_type'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
