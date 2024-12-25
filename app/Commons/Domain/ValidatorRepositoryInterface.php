<?php

namespace App\Commons\Domain;

interface ValidatorRepositoryInterface {
    public function validateId(string $table, string $id);
}
