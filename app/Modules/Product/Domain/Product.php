<?php

namespace App\Modules\Product\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\Subcategory\Domain\Subcategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'subcategory_id'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
