<?php

namespace App\Modules\Category\Domain;

use Illuminate\Http\Request;

interface CategoryRepositoryInterface {
    public function get();

    public function save(Request $request);
}
