<?php

namespace App\Modules\Subcategory\Mappers;

use App\Modules\Subcategory\Dtos\CategoryDto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use stdClass;

class CategoryMapper
{
    public ?int $category_id;

    public function __construct(?int $categoryId)
    {
        $this->category_id = $categoryId;
    }

    public function map(): CategoryDto {
        $this->validate();
        $categoryDto = new CategoryDto();
        $categoryDto->id = $this->category_id;
        return $categoryDto;
    }

    public function validate()
    {
        $rules = [ 'category_id' => 'required|integer' ];

        $messages = [ 'category_id.required' => 'Category id is required' ];

        $validator = Validator::make([ 'category_id' => $this->category_id ], $rules, $messages);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'messages' => $validator->messages()->toArray()
            ]);
        }
    }

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->query('category_id')
        );
    }
}
