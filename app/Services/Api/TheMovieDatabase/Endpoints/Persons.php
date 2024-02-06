<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\TheMovieDatabase;
use App\Services\Api\TheMovieDatabase\Entities\Person;

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
