<?php

namespace App\Services\Api\TheMovieDatabase\Endpoints;

use App\Services\Api\TheMovieDatabase\Endpoints\Person\Persons;

trait HasPeopleList
{
    public function peopleList()
    {
        return new Persons();
    }
}
