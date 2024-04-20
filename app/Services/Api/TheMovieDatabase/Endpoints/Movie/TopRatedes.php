<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Movie;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Movie\TopRated;
class TopRatedes extends BaseEndpoint
{
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/movie/top_rated?language=pt-BR&page=1&')
                ->json('results'),
            TopRated::class
        );
    }

}
