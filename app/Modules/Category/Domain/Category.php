<?php

namespace App\Modules\Category\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Subcategory\Domain\Subcategory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
