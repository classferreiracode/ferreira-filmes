<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\TheMovieDatabaseService;
use Illuminate\Support\Collection;

class BaseEndpoint
{
    protected TheMovieDatabaseService $service;

    public function __construct()
    {
        $this->service = new TheMovieDatabaseService();
    }

    protected function transform(mixed $json, string $entity): Collection
    {
        return collect($json)->map(fn ($item) => new $entity($item));
    }
}
