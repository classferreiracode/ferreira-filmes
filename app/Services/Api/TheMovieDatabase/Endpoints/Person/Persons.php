<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints\Person;

use App\Services\Api\TheMovieDatabase\Endpoints\BaseEndpoint;
use App\Services\Api\TheMovieDatabase\Entities\Person\Person;
use App\Services\Api\TheMovieDatabase\TheMovieDatabase;

class Persons extends BaseEndpoint
{
    public function get()
    {
        return $this->transform(
            $this->service
                ->api
                ->get('/person/popular?language=pt-BR')
                ->json('results'),
            Person::class
        );
    }
}
