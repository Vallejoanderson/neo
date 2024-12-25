<?php

namespace App\Modules\Subcategory\Mappers;

use App\Modules\Subcategory\Dtos\CategoryDto;
use Illuminate\Support\Facades\Validator;

class CategoryMapper
{
    public function map($request): CategoryDto {
        $this->validate($request);
        $categoryDto = new CategoryDto();
        $categoryDto->id = $request->category_id;
        return $categoryDto;
    }

    public function validate($request)
    {
        $rules = [ 'category_id' => 'required|integer' ];

        $messages = [ 'category_id.required' => 'Category id is required' ];

        $validator = Validator::make($request->route()->parameters(), $rules, $messages);

        if($validator->fails())
        {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()->toArray()
            ]);
        }
    }
}
