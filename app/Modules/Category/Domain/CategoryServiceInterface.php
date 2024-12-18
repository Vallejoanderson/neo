<?php

namespace App\Modules\Category\Domain;

use Illuminate\Http\Request;

interface CategoryServiceInterface {
    public function get();

    public function save(Request $request);
}
