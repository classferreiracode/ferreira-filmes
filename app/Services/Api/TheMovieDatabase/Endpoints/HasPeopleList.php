<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Person\Persons;
use App\Services\Api\TheMovieDatabase\TheMovieDatabase;

trait HasPeopleList
{
    public function peopleList()
    {
        return new Persons();
    }
}
