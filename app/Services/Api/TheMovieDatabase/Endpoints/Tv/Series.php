<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Tv;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Tv\Popular;
use Illuminate\Support\Collection;

class Series extends BaseEndpoint
{
    private ?int $page = 1;

    public function fromPage(int $page)
    {
        $this->page = $page;
        return $this;
    }

    public function get(): Collection
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/tv/popular?include_adult=true&language=pt-BR&page=' . $this->page)
                ->json('results'),
            Popular::class);
    }
}
