<?php

namespace App\Modules\Product\Mappers;

use App\Exceptions\MapperException;
use Illuminate\Support\Facades\Validator;

class DeleteProductMapper
{
    public function map($request): int {
        $this->validate($request);
        return $request->id;
    }

    public function validate($request)
    {
        $rules = [
            'id' => 'required|integer|validate_id_exists:products',
        ];

        $messages = [
            'id.required' => 'Product id is required',
            'id.integer' => 'Product id must be an integer',
        ];

        $validator = Validator::make($request->all() + $request->route()->parameters(), $rules, $messages);

        if($validator->fails()){
            throw new MapperException(422, messages: $validator->errors());
        }
    }
}
