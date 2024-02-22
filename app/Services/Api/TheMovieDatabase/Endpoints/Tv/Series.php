<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Tv;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Tv\Popular;
use Illuminate\Support\Collection;

class Series extends BaseEndpoint
{
    public function get() : Collection
    {
        return $this->transform(
            $this->service
            ->api
            ->get('/tv/top_rated?include_adult=true&language=pt-BR')
            ->json('results'),
            Popular::class);
    }

}
