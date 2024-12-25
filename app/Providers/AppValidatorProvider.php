<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\Commons\Domain\ValidatorRepositoryInterface;
use App\Commons\Infrastructure\ValidatorRepositoryMySQL;

class AppValidatorProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ValidatorRepositoryInterface::class, function() {
            return new ValidatorRepositoryMySQL();
        });
    }

    public function boot(): void
    {
        Validator::extend('validate_id_exists', function ($attribute, $value, $parameters, $validator) {
            if (empty($parameters) || !isset($parameters[0])) return false;

            $table = $parameters[0];
            $value = intval($value);

            return app()->make(ValidatorRepositoryInterface::class)->validateId($table, $value);
        }, ":attribute is not valid or not exists");
    }
}
