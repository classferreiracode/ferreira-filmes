<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Tv;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Tv\Upcoming;
class Upcomings extends BaseEndpoint
{
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/movie/on_the_air?language=pt-BR&page=1&include_adult=false&sort_by=release_date.desc')
                ->json('results'),
            Upcoming::class
        );
    }
}
