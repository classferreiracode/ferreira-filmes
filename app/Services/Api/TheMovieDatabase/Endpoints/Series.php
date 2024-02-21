<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Entities\Serie;
use Illuminate\Support\Collection;

class Series extends BaseEndpoint
{
    public function get() : Collection
    {
        return $this->transform(
            $this->service
            ->api
            ->get('/tv/popular?include_adult=false&language=pt-BR&sort_by=popularity.desc')
            ->json('results'),
            Serie::class);
    }

}
