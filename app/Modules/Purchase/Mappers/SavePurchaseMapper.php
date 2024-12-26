<?php

namespace App\Modules\Purchase\Mappers;

use App\Modules\Purchase\Dtos\PurchaseDto;
use App\Exceptions\MapperException;
use Illuminate\Support\Facades\Validator;

class SavePurchaseMapper
{
    public function map($request) {
        $this->validate($request);
        $purchaseDto = new PurchaseDto();
        $purchaseDto->product_id = $request->product_id;
        $purchaseDto->quantity = $request->quantity;
        $purchaseDto->price = $request->price;
        $purchaseDto->quantity_type = $request->quantity_type;

        return $purchaseDto;
    }

    public function validate($request)
    {
        $rules = [
            'product_id' => 'required|integer|validate_id_exists:products',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'quantity_type' => 'required|string|in:unit,kg',
        ];

        $messages = [
            'product_id.required' => 'Product id is required',
            'product_id.integer' => 'Product id must be an integer',
            'product_id.validate_id_exists' => 'Product id does not exist',
            'quantity.required' => 'Quantity is required',
            'quantity.numeric' => 'Quantity must be a number',
            'quantity.min' => 'Quantity must be greater than 0',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a number',
            'price.min' => 'Price must be greater than 0',
            'quantity_type.required' => 'Quantity type is required',
            'quantity_type.string' => 'Quantity type must be a string',
            'quantity_type.in' => 'Quantity type must be either unit or kg',
        ];

        $validator = Validator::make($request->all() + $request->route()->parameters(), $rules, $messages);

        if($validator->fails()){
            throw new MapperException(422, messages: $validator->errors());
        }
    }
}
