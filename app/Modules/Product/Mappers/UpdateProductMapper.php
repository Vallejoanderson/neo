<?php

namespace App\Modules\Product\Mappers;

use App\Modules\Product\Dtos\UpdateProductDto;
use App\Exceptions\MapperException;

class UpdateProductMapper
{
    public function map($request): UpdateProductDto {
        $this->validate($request);
        $productDto = new UpdateProductDto();
        $productDto->id = $request->id;
        $productDto->subcategory_id = $request->subcategory_id;
        $productDto->name = $request->name;
        return $productDto;
    }

    public function validate($request)
    {
        $rules = [
            'id' => 'required|integer',
            'subcategory_id' => 'nullable|integer',
            'name' => 'nullable|string'
        ];

        $messages = [
            'id.required' => 'Product id is required',
            'name.string' => 'Name must be a string',
            'subcategory_id.integer' => 'Subcategory id must be an integer',
        ];

        $validator = validator($request->all() + $request->route()->parameters(), $rules, $messages);

        if($validator->fails()){
            throw new MapperException(422, messages: $validator->errors());
        }
    }
}
