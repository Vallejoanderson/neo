<?php

namespace App\Modules\Product\Dtos;

class UpdateProductDto
{
    public int $id;
    public ?string $name;
    public ?int $subcategory_id;
}
