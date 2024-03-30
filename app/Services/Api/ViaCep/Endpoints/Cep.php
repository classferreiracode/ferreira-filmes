<?php

namespace App\Services\Api\ViaCep\Endpoints;

use App\Services\Api\ViaCep\Entities\OnCep;

class Cep extends BaseEndpoint
{
    private string $query;

    public function fromCep(string|OnCep $query)
    {
        $this->query = $query instanceof OnCep ? $query->cep : $query;

        return $this;
    }

    public function get()
    {
        $json[] = $this->service
            ->api
            ->get($this->query.'/json')
            ->json();

        $result = $this->transform($json, OnCep::class)[0];

        return $result;
    }
}
