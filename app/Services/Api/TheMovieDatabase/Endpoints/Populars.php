<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Entities\Popular;
use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;

class Populars extends BaseEndpoint
{
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/movie/popular?include_adult=false&language=pt-BR&sort_by=popularity.desc')
                ->json('results'),
            Popular::class
        );
    }
}
