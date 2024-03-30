<?php

namespace App\Services\Api\ViaCep\Endpoints;

trait HasCep
{
    public function getLocation()
    {
        return new Cep();
    }
}
