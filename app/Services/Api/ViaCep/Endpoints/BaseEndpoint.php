<?php
namespace App\Services\Api\ViaCep\Endpoints;

use Illuminate\Support\Collection;
use App\Services\Api\ViaCep\ViaCepService;

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
