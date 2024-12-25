<?php

namespace App\Modules\Product\Mappers;

use App\Modules\Product\Dtos\ProductDto;
use App\Exceptions\MapperException;

class SaveProductMapper
{
    public function map($request): ProductDto {
        $this->validate($request);
        $productDto = new ProductDto();
        $productDto->subcategory_id = $request->subcategory_id;
        $productDto->name = $request->name;
        return $productDto;
    }

    public function validate($request)
    {
        $rules = [ 'subcategory_id' => 'required|integer', 'name' => 'required|string' ];

        $messages = [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'subcategory_id.required' => 'Subcategory id is required',
            'subcategory_id.integer' => 'Subcategory id must be an integer',
        ];

        $validator = validator($request->all(), $rules, $messages);

        if($validator->fails()){
            throw new MapperException(422, messages: $validator->errors());
        }
    }
}
