<?php

namespace App\Modules\Product\Mappers;

use App\Modules\Product\Dtos\SearchProductDto;
use App\Exceptions\MapperException;

class SearchProductMapper
{
    public function map($request): SearchProductDto {
        $this->validate($request);
        $searchProductDto = new SearchProductDto();
        $searchProductDto->subcategory_id = $request->subcategory_id;
        $searchProductDto->search_text = $request->search_text;
        return $searchProductDto;
    }

    public function validate($request)
    {
        $rules = [
            'subcategory_id' => 'nullable|integer',
            'search_text' => 'nullable|string'
        ];

        $messages = [
            'search_text.string' => 'Name must be a string',
            'subcategory_id.integer' => 'Subcategory id must be an integer',
        ];

        $validator = validator($request->all(), $rules, $messages);

        if($validator->fails()){
            throw new MapperException(422, messages: $validator->errors());
        }
    }
}
