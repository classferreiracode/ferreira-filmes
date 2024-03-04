<?php

namespace App\Services\Api\ViaCep\Endpoints;

use App\Services\Api\ViaCep\ViaCepService;
use Illuminate\Support\Collection;

class BaseEndpoint
{
    protected ViaCepService $service;

    public function __construct()
    {
        $this->service = new ViaCepService();
    }

    protected function transform(mixed $json, string $entity): Collection
    {
        return collect($json)->map(fn ($item) => new $entity($item));
    }
}
