<?php

namespace App\Commons\Infrastructure;

use App\Commons\Domain\ValidatorRepositoryInterface;
use Illuminate\Support\Facades\DB;


class ValidatorRepositoryMySQL implements ValidatorRepositoryInterface {

    public function validateId(string $table, string $id)
    {
        try {
            return DB::table($table)
                ->where('id', $id)
                ->where('deleted_at', null)
                ->exists();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
